<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sub\SAccountingdocdetailController;
use App\Http\Controllers\Sub\SAccountingsubController;
use App\Traits\ResponseTrait;
use App\Models\m_accountingdoc;
use App\Models\s_accountingsub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MAccountingdocController extends Controller
{
    use ResponseTrait;

    ////////////////////////////////////////////////////// Requirements
    public function requirement(Request $request,SAccountingsubController $SAccountingsub,SAccountingdocdetailController $SAccountingdocdetail)
    {
        $accountingsub = $SAccountingsub->forCompany();
        
        $records = null;

        if (isset($request->accountingdocid))
            $records = $SAccountingdocdetail->recordsForAccountingdoc($request->accountingdocid);

        $res = [
            "accountingsub" => $accountingsub,
            "records" => $records ?? null,
        ];

        return $res;
    }

    ////////////////////////////////////////////////////// INDEX
    public function index(Request $request)
    {
        if (isset(auth()->user()->fk_company)) {

            $docs = DB::table('m_accountingdocs')
                ->select(
                    'm_accountingdocs.pk_accountingdoc',
                    'm_accountingdocs.accountingdocdate',
                    'm_accountingdocs.accountingdoccode',
                    'm_accountingdocs.description',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) AS registrarfullname")
                )
                ->join('users', 'users.id', '=', 'm_accountingdocs.fk_registrar')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->orderBy('m_accountingdocs.pk_accountingdoc', 'DESC')
                ->get();

            return $docs;
        }
    }

    ////////////////////////////////////////////////////// CREATE DOCUMENT
    public function createDoc(Request $request, SAccountingdocdetailController $SAccountingdocdetail)
    {
        try {
            DB::beginTransaction();

            $data = $request->validate([
                'accountingdocdate' => 'required|date',
                'accountingdoccode' => 'required|integer',
                'description' => 'nullable|string|max:45',
            ]);

            $data['fk_registrar'] = auth()->id();

            $doc = m_accountingdoc::create($data);

            if (isset($request->records)) {
                $this->createOrUpdateDetails($request, $SAccountingdocdetail, $doc->pk_accountingdoc);
            }

            DB::commit();
            return $this->successMessage();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    ////////////////////////////////////////////////////// UPDATE DOCUMENT
    public function updateDoc(Request $request, SAccountingdocdetailController $SAccountingdocdetail)
    {
        try {
            DB::beginTransaction();

            $data = $request->validate([
                'pk_accountingdoc' => 'required|integer',
                'accountingdocdate' => 'required|date',
                'accountingdoccode' => 'required|integer',
                'description' => 'nullable|string|max:45',
            ]);

            $pk = $data['pk_accountingdoc'];

            $this->isCorrectCompany(m_accountingdoc::class, $pk);

            $doc = m_accountingdoc::findOrFail($pk);

            $updateData = collect($data)->except('pk_accountingdoc')->toArray();
            $doc->update($updateData);

           
            $this->createOrUpdateDetails($request, $SAccountingdocdetail, $pk);

            DB::commit();
            return $this->successMessage();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    ////////////////////////////////////////////////////// DELETE DOCUMENT
    public function deleteDoc(Request $request, SAccountingdocdetailController $SAccountingdocdetail)
    {
        try {
            $data = $request->validate([
                'pk' => 'required|array'
            ]);

            $pk = $data['pk'];

            $this->isCorrectCompany(m_accountingdoc::class, $pk);

            
            foreach ($pk as $id) {
                $SAccountingdocdetail->deleteAllRecords($id);
            }

            m_accountingdoc::whereIn('pk_accountingdoc', $pk)->delete();

            return $this->successDelete();

        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }

    ////////////////////////////////////////////////////// DETAILS: CREATE OR UPDATE
    private function createOrUpdateDetails(Request $request, SAccountingdocdetailController $SAccountingdocdetail, $fk_accountingdoc)
    {
        if (!isset($request->records)) return;

        $records = $request->records;

        if (!is_array($records)) {
            $records = json_decode($records, true);
        }

       
        $SAccountingdocdetail->deleteOldRecords($fk_accountingdoc);

       
        foreach ($records as $record) {
            $SAccountingdocdetail->justCreate($record, $fk_accountingdoc);
            
        }
    }
}
