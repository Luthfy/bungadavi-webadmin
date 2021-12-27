<?php

namespace App\Http\Controllers\Bungadavi\Stock;

use App\Models\Stock\Stock;
use App\Models\Stock\Opname;
use App\Http\Controllers\Controller;
use App\DataTables\Stock\OpnameDataTable;
use App\Http\Requests\Stock\OpnameRequest;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OpnameDataTable $datatables)
    {
        $data = [
            'title'         => 'Stock Opname Management',
            'subtitle'      => 'Stock Opname List',
            'description'   => 'For Management Stock Opname',
            'breadcrumb'    => ['Stock Opname Management', 'Stock Opname List'],
            'button'        => ['name' => 'Add Stock Opname', 'link' => 'bungadavi.opnames.create'],
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
            'title'         => 'Stock Opname Management',
            'subtitle'      => 'Form Stock Opname',
            'description'   => 'For Management Stock Opname',
            'breadcrumb'    => ['Stock Opname Management', 'Stock Opname Form'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'stocks'        => Stock::pluck('name_stock', 'uuid')
        ];

        return view('bungadavi.opnames.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpnameRequest $request)
    {
        $opname = Opname::create($request->input());

        $stock = Stock::find($request->stocks_uuid);
        $stock->update(['qty_stock' => $stock->qty_stock - $request->qty_stock_opname]);

        if ($request->ajax()) {
            return response()->json(['status' => true, 'message' => 'success', 'data' => $opname], 200);
        }

        return redirect()->route('bungadavi.opnames.index')->with('info', 'Stock Opname Has Been Added');
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
            'title'         => 'Stock Opname Management',
            'subtitle'      => 'Form Stock Opname',
            'description'   => 'For Management Stock Opname',
            'breadcrumb'    => ['Stock Opname Management', 'Stock Opname Form'],
            'guard'         => auth()->user()->group,
            'data'          => Opname::findOrFail($id),
            'stocks'        => Stock::pluck('name_stock', 'uuid')
        ];

        return view('bungadavi.opnames.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OpnameRequest $request, $id)
    {
        $opname = Opname::findOrFail($id);

        if ($opname->stocks_uuid != $request->stocks_uuid) {
            //create new shops
            $newOpname = Opname::create($request->post());

            // stock restore old stock
            $oldStock = Stock::find($opname->stocks_uuid);
            $oldStock->update(
                ['qty_stock' => (int) $oldStock->qty_stock - (int) $request->qty_stock_opname]
            );
            // delete old shop
            $oldshop = Opname::find($opname->uuid);
            $oldshop->delete();

            // new stocks updated
            $stock  = Stock::find($request->stocks_uuid);
            $stock->update(
                ['qty_stock' => (int) $stock->qty_stock + (int) $request->qty_stock_opname]
            );
        } else {

            $opname->qty_stock_opname = $request->qty_stock_opname;
            $opname->notes_stock_opname = $request->notes_stock_opname;
            $opname->save();

            $stock  = Stock::find($request->stocks_uuid);
            $stock->update(
                ['qty_stock' => (int) $stock->qty_stock - (int) $request->qty_stock_opname]
            );
        }

        return redirect()->route('bungadavi.opnames.index')->with('info', 'Stock Opname Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);

        $stock = Stock::findOrFail($opname->stocks_uuid);
        $stock->qty_stock = (int) $stock->qty_stock + (int) $opname->qty_stock_opname;
        $stock->save();

        return $opname->delete();
    }
}
