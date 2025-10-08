<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Main\MWarehouseController;
use App\Http\Controllers\Base\BUnitController;
use App\Http\Controllers\Sub\SInvoicedetailController;
use App\Models\m_invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseTrait;

class MInvoiceController extends Controller
{
    use ResponseTrait;

    // for sale
    public function saleRequirment(Request $request, UserController $User, MWarehouseController $MWarehouse, SInvoicedetailController $SInvoicedetail, BUnitController $BUnit)
    {
        $users = $User->forCompany();
        $warehouses = $MWarehouse->index();
        $units = $BUnit->forCompany();

        if (isset($request->invoiceid))
            $records = $SInvoicedetail->recordsForInvoice($request->invoiceid);

        return [
            'users' => $users,
            'warehouses' => $warehouses,
            'units' => $units ?? null,
            'records' => $records ?? null,
        ];
    }
    public function saleInvoices(Request $request)
    {
        $fk_invoicetype = 1;
        return $this->justIndex($fk_invoicetype);
    }
    public function saleCreate(Request $request, SInvoicedetailController $SInvoicedetail)
    {
        try {
            DB::beginTransaction();

            $fk_invoicetype = 1;
            $this->justCreate($request, $SInvoicedetail, $fk_invoicetype);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function saleUpdate(Request $request, SInvoicedetailController $SInvoicedetail)
    {
        try {
            DB::beginTransaction();

            $this->justUpdate($request, $SInvoicedetail, 1);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function saleDelete(Request $request)
    {
        try {
            if (isset($request->pk)) {
                $data = $request->validate([
                    'pk' => 'required|array'
                ]);

                $pk = $data['pk'];

                $this->justDelete($pk, 1);

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }

    // for buy
    public function buyRequirment(Request $request, UserController $User, MWarehouseController $MWarehouse, SInvoicedetailController $SInvoicedetail, BUnitController $BUnit)
    {
        $users = $User->forCompany();
        $warehouses = $MWarehouse->index();
        $units = $BUnit->forCompany();


        if (isset($request->invoiceid))
            $records = $SInvoicedetail->recordsForInvoice($request->invoiceid);

        return [
            'units' => $units,
            'users' => $users,
            'warehouses' => $warehouses,
            'records' => $records ?? null,
        ];
    }
    public function buyInvoices(Request $request)
    {
        $fk_invoicetype = 2;
        return $this->justIndex($fk_invoicetype);
    }
    public function buyCreate(Request $request, SInvoicedetailController $SInvoicedetail)
    {
        try {
            DB::beginTransaction();

            $fk_invoicetype = 2;
            $this->justCreate($request, $SInvoicedetail, $fk_invoicetype);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function buyUpdate(Request $request, SInvoicedetailController $SInvoicedetail)
    {
        try {
            DB::beginTransaction();

            $this->justUpdate($request, $SInvoicedetail, 2);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function buyDelete(Request $request)
    {
        try {
            if (isset($request->pk)) {
                $data = $request->validate([
                    'pk' => 'required|array'
                ]);

                $pk = $data['pk'];

                $this->justDelete($pk, 2);

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }


    //for return 
    function invoiceForReturn()
    {
        $data = m_invoice::select(
            'm_invoices.*',
            DB::raw("CONCAT(users.name,' ',users.lastname) customerfullname")
        )
            ->where('fk_invoicetype', 1)
            ->join('users', 'm_invoices.fk_user', '=', 'users.id')
            ->join('users as registrar', 'm_invoices.fk_registrar', '=', 'registrar.id')
            ->where('registrar.fk_company', auth()->user()->fk_company)
            ->get();

        return $data;
    }
    public function returnRequirment(Request $request, UserController $User, MWarehouseController $MWarehouse, SInvoicedetailController $SInvoicedetail)
    {
        $users = $User->forCompany();
        $warehouses = $MWarehouse->index();
        $invoices = $this->invoiceForReturn();

        if (isset($request->invoiceid))
            $records = $SInvoicedetail->recordsForInvoice($request->invoiceid);

        return [
            'invoices' => $invoices,
            'users' => $users,
            'warehouses' => $warehouses,
            'records' => $records ?? null,
        ];
    }
    public function returnInvoices(Request $request)
    {
        $fk_invoicetype = 3;
        return $this->justIndex($fk_invoicetype);
    }
    public function returnCreate(Request $request, SInvoicedetailController $SInvoicedetail)
    {
        try {
            DB::beginTransaction();

            $fk_invoicetype = 3;
            $this->justCreate($request, $SInvoicedetail, $fk_invoicetype);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function returnUpdate(Request $request, SInvoicedetailController $SInvoicedetail)
    {
        try {
            DB::beginTransaction();

            $this->justUpdate($request, $SInvoicedetail, 3);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function returnDelete(Request $request)
    {
        try {
            if (isset($request->pk)) {
                $data = $request->validate([
                    'pk' => 'required|array'
                ]);

                $pk = $data['pk'];

                $this->justDelete($pk, 3);

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }

    //public
    function justDelete($pk, $fk_invoicetype)
    {
        $this->isCorrectCompany(m_invoice::class, $pk);

        $this->checkInvoiceType($pk, $fk_invoicetype);

        m_invoice::whereIn('pk_invoice', $pk)->delete();
    }
    function justIndex($fk_invoicetype)
    {
        if (isset(auth()->user()->fk_company)) {
            $invoices = DB::table('m_invoices')
                ->select(
                    'm_invoices.*',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as userfullname"),
                    DB::raw("CONCAT(registrar.name, ' ', registrar.lastname) as registrarfullname"),
                    DB::raw("pdate(substr( `m_invoices`.`created_at`, 1, 10 )) as jalaliinvoicedocdate"),
                    DB::raw('substr( `m_invoices`.`created_at`, 12, 5 ) AS `createdtime`')
                )
                ->join('users', 'm_invoices.fk_user', '=', 'users.id')
                ->join('users AS registrar', 'm_invoices.fk_registrar', '=', 'registrar.id')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->where('fk_invoicetype', $fk_invoicetype)
                ->get();

            return $invoices;
        }
    }

    function justCreate($request, $SInvoicedetail, $fk_invoicetype)
    {
        $data = $request->validate([
            'fk_user' => 'required|integer',
            'fk_warehouse' => 'nullable|integer',
            'fk_useraddress' => 'nullable|integer',
            'invoicetitle' => 'nullable|string|max:145',
            'invoicecode' => 'nullable|string|max:45',
            'invoicedocdate' => 'required|string',
            'duedate' => 'nullable|date',
            'shipping' => 'nullable|integer',
            'description' => 'nullable|string|max:225',
            'attachments' => 'nullable|files|max:5120',
        ]);

        $finaldata = $this->addRegistrar($data);

        $finaldata['fk_invoicetype'] = $fk_invoicetype;

        $invoice = m_invoice::create($finaldata);

        if (isset($invoice->pk_invoice)) {
            $this->invoiceRecordsCreateUpdate($request, $SInvoicedetail, $invoice->pk_invoice);
            $this->checkHasFiles($request, $invoice);
        }
    }
    function justUpdate($request, $SInvoicedetail, $fk_invoicetype)
    {
        $data = $request->validate([
            'pk_invoice' => 'required|integer',
            'fk_user' => 'required|integer',
            'fk_warehouse' => 'nullable|integer',
            'fk_useraddress' => 'nullable|integer',
            'invoicetitle' => 'nullable|string|max:145',
            'invoicecode' => 'nullable|string|max:45',
            'invoicedocdate' => 'required|date',
            'duedate' => 'nullable|date',
            'shipping' => 'nullable|integer',
            'description' => 'nullable|string|max:225',
        ]);
        $pk_invoice = $request->pk_invoice;

        $this->isCorrectCompany(m_invoice::class, [$pk_invoice]);

        $this->checkInvoiceType($pk_invoice, $fk_invoicetype);

        $invoice = m_invoice::findOrFail($data['pk_invoice']);

        $updateData = collect($data)->except('pk_invoice')->toArray();
        $invoice->update($updateData);


        if (isset($invoice->pk_invoice)) {
            $this->invoiceRecordsCreateUpdate($request, $SInvoicedetail, $pk_invoice);
            $this->checkHasFiles($request, $invoice);
            $this->invoiceDeleteAttachment($request, $invoice);
        }
    }
    function checkHasFiles($request, $invoice)
    {
        $pk_invioce = $invoice->pk_invoice;
        $pathsString = $invoice->attachments;

        $path_0 = '';
        $path_1 = '';
        $path_2 = '';

        if ($request->hasFile('file_0')) {
            $request->validate([
                'file_0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_0')->getClientOriginalExtension();
            $def_path_0 = $request->file('file_0')->storeAs('images/invoice/attachment', $filename, 'public');
            $path_0 = $def_path_0 . ';';
        }
        if ($request->hasFile('file_1')) {

            $request->validate([
                'file_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_1')->getClientOriginalExtension();
            $def_path_1 = $request->file('file_1')->storeAs('images/invoice/attachment', $filename, 'public');
            $path_1 = $def_path_1 . ';';
        }
        if ($request->hasFile('file_2')) {
            $request->validate([
                'file_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $filename = time() . '-' . uniqid() . '.' . $request->file('file_2')->getClientOriginalExtension();
            $def_path_2 = $request->file('file_2')->storeAs('images/invoice/attachment', $filename, 'public');
            $path_2 = $def_path_2 . ';';
        }

        $pathsString .= $path_0 . $path_1 . $path_2;

        $this->updateField($pk_invioce, 'attachments', $pathsString);
    }

    function invoiceDeleteAttachment($request, $invoice)
    {
        if (isset($request->isForDeleteAttachment) && $request->isForDeleteAttachment != '' && isset($invoice->attachments)) {
            $oldattachments = explode(';', $invoice->attachments);

            $indexesToDelete = explode(',', $request->input('isForDeleteAttachment'));

            foreach ($indexesToDelete as $index) {

                if (is_numeric($index) && isset($oldattachments[$index])) {
                    unset($oldattachments[$index]);
                }
            }
            $invoice->attachments = implode(';', array_values($oldattachments));
            $invoice->save();
        }

    }
    function invoiceRecordsCreateUpdate($request, $SInvoicerecord, $fk_invoice): void
    {
        if (isset($request->records)) {

            $records = $request->records;

            $SInvoicerecord->deleteOldrecord($fk_invoice);

            if (!is_array($records))
                $records = json_decode($records, true);

            foreach ($records as $record) {
                if (isset($record['fk_product']) && isset($record['feeprice']) && isset($record['count']))
                    $SInvoicerecord->justCreate($record, $fk_invoice);
            }
        }
    }
    function updateField($pk_invoice, $field, $value)
    {
        m_invoice::where('pk_invoice', $pk_invoice)->update([$field => $value]);
    }
    function checkInvoiceType($pk_invoice, $fk_invoicetype)
    {
        $data = m_invoice::where('pk_invoice', $pk_invoice)
            ->where('fk_invoicetype', $fk_invoicetype)
            ->exists();

        if (!$data)
            throw new \Exception(__('messages.error.incurrect_input'));
    }
}
