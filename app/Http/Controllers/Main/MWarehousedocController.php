<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\MWarehouseController;
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

    public function createDoc(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'fk_warehouse' => 'nullable|integer',
                'fk_invoice' => 'nullable|integer',
                'fk_deliverorrecipient' => 'nullable|integer',
                'warehousedocdate' => 'required|date',
                'warehousedoccode' => 'required|string|max:255',
                'deliverorrecipient' => 'nullable|string|max:255',
                'shipping' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:255',
                'attachments' => 'nullable|file|max:5120',
            ]);

            $data['fk_registrar'] = auth()->id();

            if ($request->hasFile('attachments')) {
                $filename = time() . '-' . uniqid() . '.' . $request->file('attachments')->getClientOriginalExtension();
                $attachmentPath = $request->file('attachments')->storeAs('attachments/warehousedocs', $filename, 'public');
                $data['attachments'] = $attachmentPath;
            }

            $doc = m_warehousedoc::create($data);

            DB::commit();
            return $this->successMessage($doc);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function updateDoc(Request $request)
    {
        try {
            $data = $request->validate([
                'pk_warehousedoc' => 'required|integer',
                'fk_warehouse' => 'nullable|integer',
                'fk_invoice' => 'nullable|integer',
                'fk_deliverorrecipient' => 'nullable|integer',
                'warehousedocdate' => 'required|date',
                'warehousedoccode' => 'required|string|max:255',
                'deliverorrecipient' => 'nullable|string|max:255',
                'shipping' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:255',
                'attachments' => 'nullable|file|max:5120',
                'attachmentchanged' => 'nullable|boolean',
            ]);

            $pk = $data['pk_warehousedoc'];
            $this->isCorrectCompany(m_warehousedoc::class, [$pk]);

            $doc = m_warehousedoc::findOrFail($pk);

            if (isset($data['attachmentchanged']) && $data['attachmentchanged']) {
                if ($request->hasFile('attachments')) {
                    $filename = time() . '-' . uniqid() . '.' . $request->file('attachments')->getClientOriginalExtension();
                    $attachmentPath = $request->file('attachments')->storeAs('attachments/warehousedocs', $filename, 'public');
                    $data['attachments'] = $attachmentPath;
                } else {
                    $data['attachments'] = null;
                }
            } else {
                unset($data['attachments']); // prevent overwriting
            }

            $doc->update($data);

            return response()->json($doc);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function deleteDoc(Request $request)
    {
        try {
            if (isset($request->pk)) {
                $request->validate([
                    'pk' => 'required|array',
                ]);
                $pk = $request->pk;
                $this->isCorrectCompany(m_warehousedoc::class, $pk);
                m_warehousedoc::whereIn('pk_warehousedoc', $pk)->delete();
            }
            return $this->successDelete();
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
    ///////////////////////////////////////////////////////////////////////////////// Receive
    public function receiveRequirment(MWarehouseController $MWarehouse )
    {
        $warehouses = $MWarehouse->index();
        $invoices = $MWarehouse->index();
        $users = $MWarehouse->index();

        $invoices = DB::table('m_invoices')
        ->select(
            'm_invoices.invoicecode',
            'm_invoices.pk_invoice',
            )
            ->join('users', 'users.id', '=', 'm_invoices.fk_registrar')
            ->where('users.fk_company', '=', auth()->user()->fk_company)
            ->get();

        $res = [
            "warehouses" => $warehouses,
            "invoices" => $invoices,
            "users" => $users,
        ];

        return $res;
    }
    public function createReceiveDoc(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'fk_warehouse' => 'nullable|integer',
                'fk_invoice' => 'nullable|integer',
                'fk_deliverorrecipient' => 'nullable|integer',
                'warehousedocdate' => 'required|date',
                'deliverorrecipient' => 'nullable|string|max:255',
                'shipping' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:255',
                'attachments' => 'nullable|file|max:5120',
            ]);

            $data['fk_registrar'] = auth()->id();
            $data['fk_warehousedoctype'] = 1;

            if ($request->hasFile('attachments')) {
                $filename = time() . '-' . uniqid() . '.' . $request->file('attachments')->getClientOriginalExtension();
                $attachmentPath = $request->file('attachments')->storeAs('attachments/warehousedocs', $filename, 'public');
                $data['attachments'] = $attachmentPath;
            }

            $doc = m_warehousedoc::create($data);

            DB::commit();
            return $this->successMessage($doc);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function getReceiveDocs(Request $request)
    {
        if (!auth()->user()->fk_company) {
            return $this->serverErrorResponse('Company not found for user.');
        }

        $docs = DB::table('m_warehousedocs')
            ->select(
                'm_warehousedocs.pk_warehousedoc',
                'm_warehousedocs.warehousedoccode',
                'm_warehousedocs.warehousedocdate',
                'm_warehousedocs.description',
                'm_warehousedocs.attachments',
                'm_warehousedocs.deliverorrecipient',
                'm_warehousedocs.shipping',
                'm_invoices.invoicetitle',
                DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname"),
                'm_warehouses.warehouse'
            )
            ->join('users', 'm_warehousedocs.fk_registrar', '=', 'users.id')
            ->leftJoin('m_warehouses', 'm_warehousedocs.fk_warehouse', '=', 'm_warehouses.pk_warehouse')
            ->leftJoin('m_invoices', 'm_warehousedocs.fk_invoice', '=', 'm_invoices.pk_invoice')
            ->where('users.fk_company', '=', auth()->user()->fk_company)
            ->where('m_warehousedocs.fk_warehousedoctype', '=', '1')
            ->orderByDesc('m_warehousedocs.pk_warehousedoc')
            ->get();

        return $docs;
    }
    public function updateReceiveDoc(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'pk_warehousedoc' => 'required|integer',
                'fk_warehouse' => 'nullable|integer',
                'fk_invoice' => 'nullable|integer',
                'fk_deliverorrecipient' => 'nullable|integer',
                'warehousedocdate' => 'required|date',
                'deliverorrecipient' => 'nullable|string|max:255',
                'shipping' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:255',
                'attachments' => 'nullable|file|max:5120',
            ]);

            $pk = $data['pk_warehousedoc'];
            $this->isCorrectCompany(m_warehousedoc::class,$pk);

            $model = m_warehousedoc::findOrFail($data['pk_warehousedoc']);

            if ($request->hasFile('attachments')) {
                if ($model->attachments && \Storage::disk('public')->exists($model->attachments)) {
                    \Storage::disk('public')->delete($model->attachments);
                }
                $filename = time() . '-' . uniqid() . '.' . $request->file('attachments')->getClientOriginalExtension();
                $attachmentPath = $request->file('attachments')->storeAs('attachments/warehousedocs', $filename, 'public');
                $data['attachments'] = $attachmentPath;
            }

            $model->update($data);

            DB::commit();
            return $this->successMessage($model);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function deleteReceiveDoc(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'pk_warehousedoc' => 'required|integer',
            ]);

            $pk = $data['pk_warehousedoc'];
            $this->isCorrectCompany(m_warehousedoc::class,$pk);
            

            $model = m_warehousedoc::findOrFail($request->pk_warehousedoc);

            if ($model->attachments && \Storage::disk('public')->exists($model->attachments)) {
                \Storage::disk('public')->delete($model->attachments);
            }

            $model->delete();

            DB::commit();
            return $this->successMessage('Document deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
}
