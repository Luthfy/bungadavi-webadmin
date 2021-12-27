<?php

namespace App\Http\Controllers\Bungadavi\Stock;

use App\Models\Stock\Split;
use App\Models\Stock\Stock;
use App\Models\BasicSetting\Unit;
use App\Http\Controllers\Controller;
use App\DataTables\Product\SplitDataTable;
use App\Http\Requests\ProductControl\SplitRequest;

class SplitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SplitDataTable $datatables)
    {
        $data = [
            'title'         => 'Stock Split Management',
            'subtitle'      => 'Stock Split List',
            'description'   => 'For Management Stock Split',
            'breadcrumb'    => ['Stock Split Management', 'Stock Split List'],
            'button'        => ['name' => 'Add Split Shop', 'link' => 'splits.create'],
            'guard'         => auth()->user()->group
        ];

        return $datatables->render('backend.commons.datatable', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'         => 'Stock Split Management',
            'subtitle'      => 'Form Stock Split',
            'description'   => 'For Management Stock Split',
            'breadcrumb'    => ['Stock Management', 'Stock Split Form'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'stocks'        => Stock::pluck('name_stock', 'uuid'),
            'units'         => Unit::pluck('name', 'id')
        ];

        return view('backend.splits.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SplitRequest $request)
    {
        //todo check data was added
        $stock = Stock::where('name_stock', $request->stock_fraction_name)->where('unit_id', $request->unit_id)->first();

        //todo create data to stocks table
        if (!$stock) {
            $stock              = new Stock();
            $stock->name_stock  = $request->stock_fraction_name;
            $stock->unit_id     = $request->unit_id;
            $stock->type_stock  = "2";
            $stock->qty_stock   = "0";
            $stock->save();
        }

        //todo create data to stocks split table
        $data = [
            'stock_original_uuid'   => $request->stock_original_uuid,
            'stock_fraction_uuid'   => $stock->uuid,
            'unit_id'               => $request->unit_id,
            'notes_stock_split'     => $request->notes_stock_split,
            'qty_stock_split'       => $request->qty_stock_split
        ];

        Split::create($data);

        if ($request->ajax()) {
            return response()->json(['status' => true, 'message' => 'success', 'data' => $stock], 200);
        }

        return redirect()->route('splits.index')->with('info', 'Stock Split Has Been Created');

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
            'title'         => 'Stock Split Management',
            'subtitle'      => 'Form Stock Split',
            'description'   => 'For Management Stock Split',
            'breadcrumb'    => ['Stock Management', 'Stock Split Form'],
            'guard'         => auth()->user()->group,
            'data'          => Split::findOrFail($id),
            'stocks'        => Stock::pluck('name_stock', 'uuid'),
            'units'         => Unit::pluck('name', 'id')
        ];

        return view('backend.splits.form', $data);
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
            'title'         => 'Stock Split Management',
            'subtitle'      => 'Form Stock Split',
            'description'   => 'For Management Stock Split',
            'breadcrumb'    => ['Stock Management', 'Stock Split Form'],
            'guard'         => auth()->user()->group,
            'data'          => Split::findOrFail($id),
            'stocks'        => Stock::pluck('name_stock', 'uuid'),
            'units'         => Unit::pluck('name', 'id')
        ];

        return view('backend.splits.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SplitRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $split = Split::findOrFail($id);

        Stock::find($split->stock_fraction_uuid)->forceDelete();
        return $split->delete();
    }
}