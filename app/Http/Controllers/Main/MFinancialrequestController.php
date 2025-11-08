<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sub\SFinacialreqdetailController;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Main\MWarehouseController;
use App\Http\Controllers\Base\BUnitController;
use App\Http\Controllers\Base\BFinancialpaymentmethodController;
use App\Http\Controllers\Main\MInvoiceController;
use App\Http\Controllers\Main\MMoneyboxController;
use App\Http\Controllers\Main\MBankaccountController;
use App\Http\Controllers\UserController;
use App\Models\m_warehousedoc;
use Illuminate\Http\Request;
use App\Models\m_financialrequest;
use Illuminate\Support\Facades\DB;

class MFinancialrequestController extends Controller
{
    use ResponseTrait;

    function justIndex($fk_financialrequesttype)
    {
        if (isset(auth()->user()->fk_company)) {
            $financialrequest = DB::table('m_financialrequests')
                ->select(
                    'm_financialrequests.*',
                    'm_invoices.invoicecode',
                    DB::raw("CONCAT(payerorreceiver.name, ' ', payerorreceiver.lastname) as payerorreceiverfullname"),
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname"),
                    DB::raw("pdate(substr( `m_financialrequests`.`financialrequestdate`, 1, 10 )) as jalalifinancialrequestdate"),
                    DB::raw('substr( `m_financialrequests`.`created_at`, 12, 5 ) AS `createdtime`'),
                    DB::raw("IF(m_financialrequests.title = '' OR m_financialrequests.title IS NULL, m_financialrequests.description, m_financialrequests.title) AS title"),
                )
                ->join('users', 'm_financialrequests.fk_registrar', '=', 'users.id')
                ->join('users as payerorreceiver', 'm_financialrequests.fk_payerorreceiver', '=', 'payerorreceiver.id')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->leftJoin('m_invoices', 'm_invoices.pk_invoice', '=', 'm_financialrequests.fk_invoice')
                ->where('fk_financialrequesttype', $fk_financialrequesttype)
                ->get();

            return $financialrequest;
        }
    }
    function updateField($pk_financialrequest, $field, $value)
    {
        $this->isCorrectCompany(m_financialrequest::class, $pk_financialrequest);
        m_financialrequest::where('pk_financialrequest', $pk_financialrequest)->update([$field => $value]);
    }
    function checkHasFiles($request, $financialrequest)
    {
        $pk_financialrequest = $financialrequest->pk_financialrequest;
        $pathsString = $financialrequest->attachments;

        $path_0 = '';
        $path_1 = '';
        $path_2 = '';

        if ($request->hasFile('file_0')) {
            $request->validate([
                'file_0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_0')->getClientOriginalExtension();
            $def_path_0 = $request->file('file_0')->storeAs('images/financialrequest/attachment', $filename, 'public');
            $path_0 = $def_path_0 . ';';
        }
        if ($request->hasFile('file_1')) {

            $request->validate([
                'file_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_1')->getClientOriginalExtension();
            $def_path_1 = $request->file('file_1')->storeAs('images/financialrequest/attachment', $filename, 'public');
            $path_1 = $def_path_1 . ';';
        }
        if ($request->hasFile('file_2')) {
            $request->validate([
                'file_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_2')->getClientOriginalExtension();
            $def_path_2 = $request->file('file_2')->storeAs('images/financialrequest/attachment', $filename, 'public');
            $path_2 = $def_path_2 . ';';
        }

        $pathsString .= $path_0 . $path_1 . $path_2;

        $this->updateField($pk_financialrequest, 'attachments', $pathsString);
    }
    function checkFinancialreqType($pk_financialrequest, $fk_financialrequesttype)
    {
        $data = m_financialrequest::where('pk_financialrequest', $pk_financialrequest)
            ->where('fk_financialrequesttype', $fk_financialrequesttype)
            ->exists();

        if (!$data)
            throw new \Exception(__('messages.error.incurrect_input'));
    }
    function docDeleteAttachment($request, $doc)
    {
        if (isset($request->isForDeleteAttachment) && $request->isForDeleteAttachment != '' && isset($doc->attachments)) {
            $oldattachments = explode(';', $doc->attachments);

            $indexesToDelete = explode(',', $request->input('isForDeleteAttachment'));

            foreach ($indexesToDelete as $index) {

                if (is_numeric($index) && isset($oldattachments[$index])) {
                    unset($oldattachments[$index]);
                }
            }
            $doc->attachments = implode(';', array_values($oldattachments));
            $doc->save();
        }
    }
    function docRecordsCreate($request, SFinacialreqdetailController $SFinacialreqdetail, $fk_financialrequest): void
    {
        if (isset($request->records)) {

            $records = $request->records;

            //$SFinacialreqdetail->deleteOldrecord($fk_financialrequest);

            if (!is_array($records))
                $records = json_decode($records, true);
            foreach ($records as $record) {
                $SFinacialreqdetail->justCreate($record, $fk_financialrequest);
                    
            }
        }
    }
    function docRecordsUpdate($request, SFinacialreqdetailController $SFinacialreqdetail, $fk_financialrequest): void
    {
        if (isset($request->records)) {

            $records = $request->records;

            $SFinacialreqdetail->deleteOldrecord($fk_financialrequest);

            if (!is_array($records))
                $records = json_decode($records, true);
            foreach ($records as $record) {
                $SFinacialreqdetail->justUpdate($record, $fk_financialrequest);
                    
            }
        }
    }
    public function createDoc(Request $request, $Sfinancialrequestdetail, $fk_financialrequesttype)
    {

        $data = $request->validate([
            'fk_invoice' => 'nullable|integer',
            'fk_payerorreceiver' => 'required|integer',
            'financialrequestdate' => 'required|date',
            'price' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'attachments' => 'nullable|file|max:5120',
        ]);

        $data['fk_registrar'] = auth()->id();
        $data['fk_financialrequesttype'] = $fk_financialrequesttype;

        $doc = m_financialrequest::create($data);
        if (isset($doc->pk_financialrequest)) {
            $this->docRecordsCreateUpdate($request, $Sfinancialrequestdetail, $doc->pk_financialrequest);
            //$this->checkHasFiles($request, $doc);
        }
    }

    public function updateDoc(Request $request, $Sfinancialrequestdetail, $fk_financialrequesttype)
    {

        $data = $request->validate([
            'pk_financialrequest' => 'required|integer',
            'fk_invoice' => 'nullable|integer',
            'fk_payerorreceiver' => 'required|integer',
            'financialrequestdate' => 'required|date',
            'price' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'attachments' => 'nullable|file|max:5120',

        ]);

        $pk = $data['pk_financialrequest'];
        $this->isCorrectCompany(m_financialrequest::class, [$pk]);

        $this->checkFinancialreqType($pk, $fk_financialrequesttype);

        $doc = m_financialrequest::findOrFail($pk);
        $updateData = collect($data)->except('pk_financialrequest')->toArray();
        $doc->update($updateData);

        if (isset($doc->pk_financialrequest)) {
            $this->docRecordsUpdate($request, $Sfinancialrequestdetail, $pk);
            // $this->checkHasFiles($request, $doc);
            // $this->docDeleteAttachment($request, $doc);
        }
    }

    public function deleteDoc($pk, $fk_financialrequesttype, SFinacialreqdetailController $Sfinancialrequestdetai)
    {
        $this->isCorrectCompany(m_financialrequest::class, $pk);

        $this->checkfinancialreqType($pk, $fk_financialrequesttype);
        $Sfinancialrequestdetai->deleteAllrecords($pk);
        m_financialrequest::whereIn('pk_financialrequest', $pk)->delete();
    }
    ////////////////////////////////////////////////////////////////////////// Receive
    public function receiveRequirment(Request $request, BUnitController $BUnit, MInvoiceController $Minvoice, SFinacialreqdetailController $Sfinancialreqdetail, UserController $User, MMoneyboxController $Moneybox, MBankaccountController $Bankaccount, BFinancialpaymentmethodController $Method)
    {
        $tabs = $Method->getMethods();
        $bankaccounts = $Bankaccount->forCompany();
        $moneyboxes = $Moneybox->forCompany();
        $users = $User->forCompany();
        $invoices = $Minvoice->index();
        $records = null;

        if (isset($request->financialreqid)){
            $this->isCorrectCompany(m_financialrequest::class,$request->financialreqid);
            $records = $Sfinancialreqdetail->recordsForFinancialreq($request->financialreqid);
        }
            

        $res = [
            "tabs" => $tabs,
            "bankaccounts" => $bankaccounts,
            "moneyboxes" => $moneyboxes,
            "invoices" => $invoices,
            "users" => $users,
            "records" => $records ?? null,
        ];

        return $res;
    }
    public function createReceiveDoc(Request $request, SFinacialreqdetailController $Sfinancialreqdetail)
    {
        try {
            DB::beginTransaction();
            $fk_financialrequesttype = 1;
            $this->createDoc($request, $Sfinancialreqdetail, $fk_financialrequesttype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function updateReceiveDoc(Request $request, SFinacialreqdetailController $Sfinancialreqdetail)
    {
        try {
            DB::beginTransaction();
            $fk_financialrequesttype = 1;
            $this->updateDoc($request, $Sfinancialreqdetail, $fk_financialrequesttype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function deleteReceiveDoc(Request $request,SFinacialreqdetailController $Sfinancialreqdetail)
    {
        try {
            if (isset($request->pk)) {
                $data = $request->validate([
                    'pk' => 'required|array'
                ]);

                $pk = $data['pk'];

                $this->deleteDoc($pk, 1,$Sfinancialreqdetail);

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
    public function getReceiveDocs(Request $request)
    {
        $fk_financialrequesttype = 1;
        return $this->justIndex($fk_financialrequesttype);
    }
}
