<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sub\SAccountingsubController;
use App\Http\Controllers\Base\BUnitController;
use App\Http\Controllers\Base\BProductcategoryController;

use App\Models\m_product;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MProductController extends Controller
{
    use ResponseTrait;

    function searchForCompany(Request $request)
    {
        if (isset($request->product)) {
            $product = $request->product;

            $data = m_product::select('pk_product', 'product')
                ->where('product', 'LIKE', "%$product%")
                ->limit(5)
                ->get();

            return $data;
        }

    }
    public function index(Request $request = null)
    {
        if (isset(auth()->user()->fk_company)) {
            $products = DB::table('m_products')
                ->select(
                    'm_products.pk_product',
                    'm_products.product',
                    'm_products.productsec',
                    'm_products.productcode',
                    'm_products.barcode',
                    'm_products.imagepath',
                    'm_products.fk_unit',
                    'm_products.fk_secunit',
                    'm_products.fk_taxtype',
                    'm_products.fk_productcategory',
                    'm_products.conversionfactor',
                    'm_products.weight',
                    'm_products.height',
                    'm_products.width',
                    'm_products.color',
                    'm_products.tax',
                    'm_products.descriptions',
                    'm_products.property',
                    'm_products.keywords',
                    'm_products.saleprice',
                    'm_products.buyprice',
                    'm_products.iscommingsoon',
                    'm_products.isavailable',
                    'm_products.isforonlinesale',
                    'm_products.fk_accountingsub',
                    's_accountingsubs.accountingsubcode',
                    's_accountingsubs.accountingsub',
                    DB::raw("CONCAT(registrar.name, ' ', registrar.lastname) as registrarfullname"),
                )
                ->join('users as registrar', 'm_products.fk_registrar', '=', 'registrar.id')
                ->leftjoin('s_accountingsubs', 'm_products.fk_accountingsub', '=', 's_accountingsubs.pk_accountingsub')
                ->where('registrar.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $products;
        }

    }

    public function createProduct(Request $request, SAccountingsubController $SAccountingsub)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'product' => 'required|string|max:255',
                'productsec' => 'nullable|string|max:255',
                'productcode' => 'nullable|string|max:255',
                'barcode' => 'nullable|string|max:255',
                'fk_unit' => 'nullable|integer',
                'fk_secunit' => 'nullable|integer',
                'fk_taxtype' => 'nullable|integer',
                'fk_productcategory' => 'nullable|integer',
                'conversionfactor' => 'nullable|integer',
                'weight' => 'nullable|numeric',
                'height' => 'nullable|numeric',
                'width' => 'nullable|numeric',
                'color' => 'nullable|string|max:255',
                'tax' => 'nullable|integer',
                'descriptions' => 'nullable|string|max:255',
                'property' => 'nullable|string|max:255',
                'keywords' => 'nullable|string|max:255',
                'saleprice' => 'nullable|numeric',
                'buyprice' => 'nullable|numeric',
                'iscommingsoon' => 'nullable|boolean',
                'isavailable' => 'nullable|boolean',
                'isforonlinesale' => 'nullable|boolean',
            ]);

            $data = $SAccountingsub->addSubAccountingDoc($data, $request, 2);

            $finaldata = $this->addRegistrar($data);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);

                $filename = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('images/products', $filename, 'public');
            }
            $finaldata['imagepath'] = $imagePath;

            $product = m_product::create($finaldata);

            DB::commit();
            return $this->successMessage($product);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function updateProduct(Request $request, SAccountingsubController $SAccountingsub)
    {
        try {
            $data = $request->validate([
                'pk_product' => 'required|integer',
                'product' => 'required|string|max:255',
                'productsec' => 'nullable|string|max:255',
                'productcode' => 'nullable|string|max:255',
                'barcode' => 'nullable|string|max:255',
                'fk_unit' => 'nullable|integer',
                'fk_secunit' => 'nullable|integer',
                'fk_taxtype' => 'nullable|integer',
                'fk_productcategory' => 'nullable|integer',
                'conversionfactor' => 'nullable|integer',
                'weight' => 'nullable|numeric',
                'height' => 'nullable|numeric',
                'width' => 'nullable|numeric',
                'color' => 'nullable|string|max:255',
                'tax' => 'nullable|integer',
                'descriptions' => 'nullable|string|max:255',
                'property' => 'nullable|string|max:255',
                'keywords' => 'nullable|string|max:255',
                'saleprice' => 'nullable|numeric',
                'buyprice' => 'nullable|numeric',
                'iscommingsoon' => 'nullable|boolean',
                'isavailable' => 'nullable|boolean',
                'isforonlinesale' => 'nullable|boolean',
            ]);

            $pk = $data['pk_product'];

            $this->isCorrectCompany(m_product::class, [$pk]);

            $SAccountingsub->updateAuto($request);

            $product = m_product::findOrFail($pk);

            $imagePath = null;
            if (isset($request->imagechanged) && $request->imagechanged == 1) {
                if ($request->hasFile('image')) {

                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg|max:2120',
                    ]);

                    $filename = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                    $imagePath = $request->file('image')->storeAs('images/products', $filename, 'public');
                }
                $product->update(['imagepath' => $imagePath]);
            }

            $product->update($data);

            return response()->json($product);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function deleteProduct(Request $request)
    {
        try {
            if (isset($request->pk)) {
                $request->validate([
                    'pk' => 'required|array',
                ]);
                $pk = $request->pk;
                $this->isCorrectCompany(m_product::class, $pk);
                m_product::whereIn('pk_product', $pk)->delete();
            }
            return $this->successDelete();
        } catch (\Illuminate\Database\QueryException $e) {
            throw $e;
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
    function requirment(BUnitController $BUnit, BProductcategoryController $BProductcategory)
    {
        $units = $BUnit->forCompany();
        $productcategories = $BProductcategory->forCompany();

        $res = [
            'units' => $units,
            'productcategories' => $productcategories,
            'taxtypes' => []
        ];

        return $res;
    }
}
