<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\MWarehouseController;
use App\Http\Controllers\Base\BUnitController;
use App\Http\Controllers\Main\MInvoiceController;
use App\Http\Controllers\Sub\SWarehousedocdetailController;
use App\Traits\ResponseTrait;
use App\Models\m_warehousedoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MWarehouseDocController extends Controller
{
    use ResponseTrait;

    function requirment(MWarehouseController $MWarehouse)
    {
        $warehouses = $MWarehouse->index();
        $invoices = $MWarehouse->index();
        $users = $MWarehouse->index();

        $res = [
            "warehouses" => $warehouses,
            "invoices" => $invoices,
            "users" => $users,
        ];

        return $res;
    }
    public function index(Request $request)
    {
        if (isset(auth()->user()->fk_company)) {

            $docs = DB::table('m_warehousedocs')
                ->select(
                    'm_warehousedocs.pk_warehousedoc',
                    'm_warehousedocs.fk_warehouse',
                    'm_warehousedocs.fk_invoice',
                    'm_warehousedocs.fk_deliverorrecipient',
                    'm_warehousedocs.warehousedocdate',
                    'm_warehousedocs.warehousedoccode',
                    'm_warehousedocs.deliverorrecipient',
                    'm_warehousedocs.shipping',
                    'm_warehousedocs.description',
                    'm_warehousedocs.attachments',
                    DB::raw("CONCAT(registrar.name, ' ', registrar.lastname) as registrarfullname"),
                )
                ->join('users as registrar', 'm_warehousedocs.fk_registrar', '=', 'registrar.id')
                ->where('registrar.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $docs;
        }
    }

    public function createDoc(Request $request, $Swarehousedocdetail, $fk_warehousedoctype)
    {

        $data = $request->validate([
            'fk_warehouse' => 'nullable|integer',
            'fk_destinationwarehouse' => 'nullable|integer',
            'fk_invoice' => 'nullable|integer',
            'fk_deliverorrecipient' => 'nullable|integer',
            'warehousedocdate' => 'required|date',
            'warehousedoccode' => 'nullable|string|max:255',
            'deliverorrecipient' => 'nullable|string|max:255',
            'shipping' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'attachments' => 'nullable|file|max:5120',
        ]);

        $data['fk_registrar'] = auth()->id();
        $data['fk_warehousedoctype'] = $fk_warehousedoctype;

        $doc = m_warehousedoc::create($data);
        if (isset($doc->pk_warehousedoc)) {
            $this->docRecordsCreateUpdate($request, $Swarehousedocdetail, $doc->pk_warehousedoc);
            $this->checkHasFiles($request, $doc);
        }
    }

    public function updateDoc(Request $request,$Swarehousedocdetail, $fk_warehousedoctype)
    {
        
        $data = $request->validate([
            'pk_warehousedoc' => 'required|integer',
            'fk_warehouse' => 'nullable|integer',
            'fk_destinationwarehouse' => 'nullable|integer',
            'fk_invoice' => 'nullable|integer',
            'fk_deliverorrecipient' => 'nullable|integer',
            'warehousedocdate' => 'required|date',
            'warehousedoccode' => 'nullable|string|max:255',
            'deliverorrecipient' => 'nullable|string|max:255',
            'shipping' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            
        ]);

        $pk = $data['pk_warehousedoc'];
        $this->isCorrectCompany(m_warehousedoc::class, [$pk]);

        $this->checkWarehousedocType($pk, $fk_warehousedoctype);

        $doc = m_warehousedoc::findOrFail($pk);
        $updateData = collect($data)->except('pk_warehousedoc')->toArray();
        $doc->update($updateData);

        if (isset($doc->pk_warehousedoc)) {
        $this->docRecordsCreateUpdate($request, $Swarehousedocdetail, $pk);
        $this->checkHasFiles($request, $doc);
        $this->docDeleteAttachment($request, $doc);
        }   

       
    }

    public function deleteDoc($pk,$fk_warehousedoctype,SWarehousedocdetailController $Swarehousedocdetai)
    {
        $this->isCorrectCompany(m_warehousedoc::class, $pk);

        $this->checkwarehousedocType($pk, $fk_warehousedoctype);
        $Swarehousedocdetai->deleteAllrecords($pk);
        m_warehousedoc::whereIn('pk_warehousedoc', $pk)->delete();

    }
    function docRecordsCreateUpdate($request, SWarehousedocdetailController $Swarehousedocdetail, $fk_warehousedoc): void
    {
        if (isset($request->records)) {

            $records = $request->records;

            $Swarehousedocdetail->deleteOldrecord($fk_warehousedoc);

            if (!is_array($records))
                $records = json_decode($records, true);

            foreach ($records as $record) {
                if (isset($record['fk_product']) && isset($record['feeprice']) && isset($record['count']))
                    $Swarehousedocdetail->justCreate($record, $fk_warehousedoc);
            }
        }
    }
    function updateField($pk_warehousedoc, $field, $value)
    {
        $this->isCorrectCompany(m_warehousedoc::class,$pk_warehousedoc);
        m_warehousedoc::where('pk_warehousedoc', $pk_warehousedoc)->update([$field => $value]);
    }
    function checkHasFiles($request, $warehousedoc)
    {
        $pk_warehousedoc = $warehousedoc->pk_warehousedoc;
        $pathsString = $warehousedoc->attachments;

        $path_0 = '';
        $path_1 = '';
        $path_2 = '';

        if ($request->hasFile('file_0')) {
            $request->validate([
                'file_0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_0')->getClientOriginalExtension();
            $def_path_0 = $request->file('file_0')->storeAs('images/warehousedoc/attachment', $filename, 'public');
            $path_0 = $def_path_0 . ';';
        }
        if ($request->hasFile('file_1')) {

            $request->validate([
                'file_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_1')->getClientOriginalExtension();
            $def_path_1 = $request->file('file_1')->storeAs('images/warehousedoc/attachment', $filename, 'public');
            $path_1 = $def_path_1 . ';';
        }
        if ($request->hasFile('file_2')) {
            $request->validate([
                'file_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_2')->getClientOriginalExtension();
            $def_path_2 = $request->file('file_2')->storeAs('images/warehousedoc/attachment', $filename, 'public');
            $path_2 = $def_path_2 . ';';
        }

        $pathsString .= $path_0 . $path_1 . $path_2;

        $this->updateField($pk_warehousedoc, 'attachments', $pathsString);
    }
    function justIndex($fk_warehousedoctype)
    {
        if (isset(auth()->user()->fk_company)) {
            $warehousedoc = DB::table('m_warehousedocs')
                ->select(
                    'm_warehousedocs.*',
                    'm_warehouses.warehouse',
                    'destinationwarehouse.warehouse as destinationwarehousename',
                    'm_invoices.invoicecode',
                    DB::raw("CONCAT(deliverorrecipientuser.name, ' ', deliverorrecipientuser.lastname) as deliverorrecipientfullname"),
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname"),
                    DB::raw("pdate(substr( `m_warehousedocs`.`created_at`, 1, 10 )) as jalaliwarehousedocdate"),
                    DB::raw('substr( `m_warehousedocs`.`created_at`, 12, 5 ) AS `createdtime`')
                )
                ->join('users', 'm_warehousedocs.fk_registrar', '=', 'users.id')
                ->leftJoin('users as deliverorrecipientuser', 'm_warehousedocs.fk_deliverorrecipient', '=', 'deliverorrecipientuser.id')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->leftJoin('m_warehouses', 'm_warehouses.pk_warehouse', '=', 'm_warehousedocs.fk_warehouse')
                ->leftJoin('m_warehouses as destinationwarehouse', 'destinationwarehouse.pk_warehouse', '=', 'm_warehousedocs.fk_destinationwarehouse')
                ->leftJoin('m_invoices', 'm_invoices.pk_invoice', '=', 'm_warehousedocs.fk_invoice')
                ->where('fk_warehousedoctype', $fk_warehousedoctype)
                ->get();

            return $warehousedoc;
        }
    }
    function checkWarehousedocType($pk_warehousedoc, $fk_warehousedoctype)
    {
        $data = m_warehousedoc::where('pk_warehousedoc', $pk_warehousedoc)
            ->where('fk_warehousedoctype', $fk_warehousedoctype)
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
    ///////////////////////////////////////////////////////////////////////////////// Receive
    public function receiveRequirment(Request $request,MWarehouseController $MWarehouse, BUnitController $BUnit, MInvoiceController $Minvoice,SWarehousedocdetailController $Swarehousedocdetail)
    {
        $warehouses = $MWarehouse->index();
        $invoices = $MWarehouse->index();
        $users = $MWarehouse->index();
        $units = $BUnit->forCompany();
        $invoices = $Minvoice->index();
        $records = null;

        if (isset($request->warehousedocid))
            $records = $Swarehousedocdetail->recordsForWarehousedoc($request->warehousedocid);

        $res = [
            "warehouses" => $warehouses,
            "invoices" => $invoices,
            "users" => $users,
            "units" => $units,
            "records" => $records ?? null,
        ];

        return $res;
    }
    public function createReceiveDoc(Request $request, SWarehousedocdetailController $Swarehousedocdetail)
    {
        try {
            DB::beginTransaction();
            $fk_warehousedoctype = 1;
            $this->createDoc($request, $Swarehousedocdetail, $fk_warehousedoctype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function getReceiveDocs(Request $request)
    {
        $fk_warehousedoctype = 1;
        return $this->justIndex($fk_warehousedoctype);
    }
    public function updateReceiveDoc(Request $request,SWarehousedocdetailController $Swarehousedocdetail)
    {
       try {
            DB::beginTransaction();
            $fk_warehousedoctype = 1;
            $this->updateDoc($request, $Swarehousedocdetail, $fk_warehousedoctype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function deleteReceiveDoc(Request $request,SWarehousedocdetailController $Swarehousedocdetai)
    {
        try {
            if (isset($request->pk)) {
                $data = $request->validate([
                    'pk' => 'required|array'
                ]);

                $pk = $data['pk'];

                $this->deleteDoc($pk, 1,$Swarehousedocdetai);

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
    ///////////////////////////////////////////////////////////////////////////////// Exit
    public function exitRequirment(Request $request,MWarehouseController $MWarehouse, BUnitController $BUnit, MInvoiceController $Minvoice,SWarehousedocdetailController $Swarehousedocdetail)
    {
        $warehouses = $MWarehouse->index();
        $invoices = $MWarehouse->index();
        $users = $MWarehouse->index();
        $units = $BUnit->forCompany();
        $invoices = $Minvoice->index();
        $records = null;

        if (isset($request->warehousedocid))
            $records = $Swarehousedocdetail->recordsForWarehousedoc($request->warehousedocid);

        $res = [
            "warehouses" => $warehouses,
            "invoices" => $invoices,
            "users" => $users,
            "units" => $units,
            "records" => $records ?? null,
        ];

        return $res;
    }
    public function createExitDoc(Request $request, SWarehousedocdetailController $Swarehousedocdetail)
    {
        try {
            DB::beginTransaction();
            $fk_warehousedoctype = 3;
            $this->createDoc($request, $Swarehousedocdetail, $fk_warehousedoctype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function getExitDocs(Request $request)
    {
        $fk_warehousedoctype = 3;
        return $this->justIndex($fk_warehousedoctype);
    }
    public function updateExitDoc(Request $request,SWarehousedocdetailController $Swarehousedocdetail)
    {
       try {
            DB::beginTransaction();
            $fk_warehousedoctype = 3;
            $this->updateDoc($request, $Swarehousedocdetail, $fk_warehousedoctype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function deleteExitDoc(Request $request,SWarehousedocdetailController $Swarehousedocdetai)
    {
        try {
            if (isset($request->pk)) {
                $data = $request->validate([
                    'pk' => 'required|array'
                ]);

                $pk = $data['pk'];

                $this->deleteDoc($pk, 3,$Swarehousedocdetai);

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
    ///////////////////////////////////////////////////////////////////////////////// Transfer
    public function transferRequirment(Request $request,MWarehouseController $MWarehouse, BUnitController $BUnit, MInvoiceController $Minvoice,SWarehousedocdetailController $Swarehousedocdetail)
    {
        $warehouses = $MWarehouse->index();
        $invoices = $MWarehouse->index();
        $users = $MWarehouse->index();
        $units = $BUnit->forCompany();
        $invoices = $Minvoice->index();
        $records = null;

        if (isset($request->warehousedocid))
            $records = $Swarehousedocdetail->recordsForWarehousedoc($request->warehousedocid);

        $res = [
            "warehouses" => $warehouses,
            "invoices" => $invoices,
            "users" => $users,
            "units" => $units,
            "records" => $records ?? null,
        ];

        return $res;
    }
    public function createTransferDoc(Request $request, SWarehousedocdetailController $Swarehousedocdetail)
    {
        try {
            DB::beginTransaction();
            $fk_warehousedoctype = 2;
            $this->createDoc($request, $Swarehousedocdetail, $fk_warehousedoctype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function getTransferDocs(Request $request)
    {
        $fk_warehousedoctype = 2;
        return $this->justIndex($fk_warehousedoctype);
    }
    public function updateTransferDoc(Request $request,SWarehousedocdetailController $Swarehousedocdetail)
    {
       try {
            DB::beginTransaction();
            $fk_warehousedoctype = 2;
            $this->updateDoc($request, $Swarehousedocdetail, $fk_warehousedoctype);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function deleteTransferDoc(Request $request,SWarehousedocdetailController $Swarehousedocdetai)
    {
        try {
            if (isset($request->pk)) {
                $data = $request->validate([
                    'pk' => 'required|array'
                ]);

                $pk = $data['pk'];

                $this->deleteDoc($pk, 2,$Swarehousedocdetai);

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
}
