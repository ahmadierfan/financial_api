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
}
