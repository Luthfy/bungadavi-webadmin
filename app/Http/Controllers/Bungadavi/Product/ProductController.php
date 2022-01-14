<?php

namespace App\Http\Controllers\Bungadavi\Product;

use App\Models\Stock\Stock;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Location\City;
use App\Models\Product\Product;
use App\Models\Product\Material;
use App\Models\BasicSetting\Color;
use App\Models\Customer\Affiliate;
use App\Models\Product\ProductCity;
use App\Http\Controllers\Controller;
use App\Models\Product\ProductColor;
use App\Models\BasicSetting\Currency;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubCategory;
use App\DataTables\Product\ProductDataTable;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $datatables)
    {
        $data = [
            'title'         => 'Product Management',
            'subtitle'      => 'Product List',
            'description'   => 'For Management Product and Stocks',
            'breadcrumb'    => ['Product Management', 'Product List'],
            'button'        => ['name' => 'Add Product', 'link' => 'bungadavi.products.create'],
            'guard'         => auth()->user()->group
        ];

        return $datatables->render('commons.datatable', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'         => 'Product Management',
            'subtitle'      => 'Form Product',
            'description'   => 'For Management Product and Material',
            'breadcrumb'    => ['Product Management', 'Form Product'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'printModeType' => [
                                    '0' => 'A5 Potrait Bottom',
                                    '1' => 'A5 Potrait Center',
                                    '2' => 'A4 Landscape Center',
                                ],
            'currencies'    => Currency::pluck('name', 'id') ?? [],
            'colors'        => Color::pluck('name', 'id') ?? [],
            'stocks'        => Stock::pluck('name_stock', 'uuid') ?? [],
            'florist'       => Affiliate::pluck('fullname', 'uuid') ?? [],
            'cities'        => City::pluck('name', 'id') ?? []
        ];

        return view('bungadavi.products.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()){

            $request->validate([
                'name_product'                  => ['required'],
                'short_description_product'     => ['required'],
                'short_description_en_product'  => ['required'],
                'description_product'           => ['required'],
                'description_en_product'        => ['required'],
                'cost_product'                  => ['required'],
                'florist_cost_product'          => ['required'],
                'selling_price_product'         => ['required'],
                'selling_florist_price_product' => ['required'],
                'categories_uuid'               => ['required']
            ]);

            $request->request->add(['size_product' => count($request->products_material ?? [])]);

            if ($request->hasFile('product_main_image')){
                $name = Str::random(4) . '_' . str_replace(' ', '', $request->file('product_main_image')->getClientOriginalName());
                $request->request->add(['image_main_product' => $request->product_main_image->storeAs('products_main', $name, 'public')]);
            }

            $products = Product::create($request->post());

            if (count($request->categories_uuid ?? []) > 0) {
                foreach ($request->categories_uuid as $value) {
                    ProductCategory::create(['category_id' => $value, 'products_uuid' => $products->uuid]);
                }
            }

            if (count($request->subcategories_uuid ?? []) > 0) {
                foreach ($request->subcategories_uuid as $value) {
                    ProductSubCategory::create(['subcategory_id' => $value, 'products_uuid' => $products->uuid]);
                }
            }

            if (count($request->color_id ?? []) > 0) {
                foreach ($request->color_id as $value) {
                    ProductColor::create(['color_id' => $value, 'products_uuid' => $products->uuid]);
                }
            }

            if (count($request->cities_uuid ?? []) > 0) {
                foreach ($request->cities_uuid as $value) {
                    ProductCity::create(['city_id' => $value, 'products_uuid' => $products->uuid]);
                }
            }

            $productsMaterial = json_decode($request->product_material, true);
            if ($productsMaterial != null) {
                foreach ($productsMaterial as $key => $value) {
                    $material = [
                        'stocks_uuid' => $value['stocks_uuid'],
                        'products_uuid' => $products->uuid,
                        'qty_used_products_material' => $value['qty'] ?? 0,
                    ];
                    $materials = Material::create($material);
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $products
            ], 200);
        }

    }

    function uploads(Request $request)
    {
        $image = array();
        foreach ($request->file('product_images') as $key => $value) {
            if ($request->hasFile('product_images')) {
                $name = Str::random(4) . '_' . str_replace(' ', '', $value->getClientOriginalName());
                array_push($image, $value->storeAs('products_feature', $name, 'public'));
            }
        }

        $product = Product::findOrFail($request->id);
        $product->images_product = json_encode($image);
        $product->save();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $product
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title'         => 'Product Management',
            'subtitle'      => 'Detail Product',
            'description'   => 'For Management Product and Material',
            'breadcrumb'    => ['Product Management', 'Detail Product'],
            'guard'         => auth()->user()->group,
            'data'          => Product::findOrFail($id)
        ];

        return view('bungadavi.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title'         => 'Product Management',
            'subtitle'      => 'Form Product',
            'description'   => 'For Management Product and Material',
            'breadcrumb'    => ['Product Management', 'Form Product'],
            'guard' => auth()->user()->group,
            'data'  => Product::findOrFail($id),
            'currencies' => Currency::pluck('name', 'id'),
            'colors' => Color::pluck('name', 'id'),
            'stocks' => Stock::pluck('name_stock', 'uuid')
        ];

        return view('bungadavi.products.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return redirect()->route('userdetail.index')->with('info', 'User Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::find($id)->delete();
    }

    public function list()
    {
        $ids = explode(",", $_GET['data']);

        return response()->json(
            Product::whereIn('uuid', $ids)->with('materials.stock')->get()->toArray()
        );
    }
}
