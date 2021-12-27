<?php

namespace App\Http\Controllers\Bungadavi\Stock;

use App\Models\Stock\Shop;
use App\Models\Stock\Stock;
use App\Http\Controllers\Controller;
use App\DataTables\Stock\ShopDataTable;
use App\Http\Requests\Stock\ShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShopDataTable $datatables)
    {
        $data = [
            'title'         => 'Stock Shop Management',
            'subtitle'      => 'Stock Shop List',
            'description'   => 'For Management Stock Shop',
            'breadcrumb'    => ['Stock Shop Management', 'Stock Shop List'],
            'button'        => ['name' => 'Add Stock Shop', 'link' => 'bungadavi.shops.create'],
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
            'title'         => 'Stock Shop Management',
            'subtitle'      => 'Form Stock Shop',
            'description'   => 'For Management Stock Shop Shop',
            'breadcrumb'    => ['Stock Management', 'Stock Shop Form'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'stocks'        => Stock::pluck('name_stock', 'uuid')
        ];

        return view('bungadavi.shops.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $shop   = Shop::create($request->post());
        $stock  = Stock::find($request->stocks_uuid)->update(['qty_stock' => (int) $shop->stocks()->first()->qty_stock + ((int) $request->qty_stock_shop - (int) $request->reject_stock_shop)]);

        if ($request->ajax()) {
            return response()->json(['status' => true, 'message' => 'success', 'data' => $shop], 200);
        }

        return redirect()->route('bungadavi.shops.index')->with('info', 'Shop and Stock '.$request->name_stock.' Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'title'         => 'Stock Shop Management',
            'subtitle'      => 'Form Stock Shop',
            'description'   => 'For Management Stock Shop Shop',
            'breadcrumb'    => ['Stock Management', 'Stock Shop Form'],
            'guard'         => auth()->user()->group,
            'data'          => Shop::findOrFail($id),
            'stocks'        => Stock::pluck('name_stock', 'uuid')
        ];


        return view('bungadavi.shops.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request, $id)
    {
        $shop = Shop::findOrFail($id);

        if ($shop->stocks_uuid != $request->stocks_uuid) {
            //create new shops
            $newShop = Shop::create($request->post());

            // stock restore old stock
            $oldStock = Stock::find($shop->stocks_uuid);
            $oldStock->update(['qty_stock' => (int) $oldStock->qty_stock - ((int) $shop->qty_stock_shop - (int) $shop->reject_stock_shop)]);

            // delete old shop
            $oldshop = Shop::find($shop->uuid);
            $oldshop->delete();

            // new stocks updated
            $stock  = Stock::find($request->stocks_uuid);
            $stock->update(['qty_stock' => (int) $stock->qty_stock + ((int) $request->qty_stock_shop - (int) $request->reject_stock_shop)]);
        } else {
            $shop->total_price_stock_shop = $request->total_price_stock_shop;
            $shop->qty_stock_shop    = $request->qty_stock_shop;
            $shop->reject_stock_shop = $request->reject_stock_shop;
            $shop->notes_stock_shop  = $request->notes_stock_shop;
            $shop->save();

            $stock  = Stock::find($request->stocks_uuid);
            $stock->update(
                ['qty_stock' => (int) $stock->qty_stock + ((int) $request->qty_stock_shop - (int) $request->reject_stock_shop)]
            );
        }

        return redirect()->route('bungadavi.shops.index')->with('info', 'Shop and Stock '.$request->name_stock.' Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);

        $stock = Stock::findOrFail($shop->stocks_uuid);
        $stock->qty_stock = (int) $stock->qty_stock - ((int) $shop->qty_stock_shop - (int) $shop->reject_stock_shop);
        $stock->save();

        return $shop->delete();
    }
}
