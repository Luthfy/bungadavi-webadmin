<?php

namespace App\Http\Controllers\Bungadavi\Stock;

use App\Models\Stock\Stock;
use Illuminate\Support\Str;
use App\Models\BasicSetting\Unit;
use App\Http\Controllers\Controller;
use App\DataTables\Stock\StockDataTable;
use App\Http\Requests\Stock\StockRequest;

class StockController extends Controller
{
    public function __construct()
    {

    }

    public function index(StockDataTable $datatables)
    {
        $data = [
            'title'         => 'Stock Management',
            'subtitle'      => 'Stock List',
            'description'   => 'For Management Stock',
            'breadcrumb'    => ['Stock Management', 'Stock List'],
            'button'        => ['name' => 'Add Stock', 'link' => 'bungadavi.stocks.create'],
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
            'title'         => 'Stock Management',
            'subtitle'      => 'Form Stock',
            'description'   => 'For Management Stock',
            'breadcrumb'    => ['Stock Management', 'Stock Form'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'units'         => Unit::pluck('name', 'id')
        ];

        return view('bungadavi.stocks.form', $data);
    }

    public function store(StockRequest $request)
    {
        if ($request->hasFile('image_stock')) {
            $name = Str::random(4) . '_' . str_replace(' ', '', $request->file('image_stock')->getClientOriginalName());
            $request->request->add(['image_stock' => $request->image_stock->storeAs('image_stock', $name, 'public')]);
        }

        $stock = Stock::create($request->post());

        return redirect()->route('bungadavi.stocks.index')->with('info', 'Stock '.$request->name_stock.' Has Been Added');
    }

    public function show($id)
    {
        $data = [
            'title'         => 'Stock Management',
            'subtitle'      => 'Detail Stock',
            'description'   => 'For Management Stock',
            'breadcrumb'    => ['Stock Management', 'Stock Detail'],
            'guard'         => auth()->user()->group,
            'data'          => Stock::findOrFail($id),
            'units'         => Unit::pluck('name', 'id')
        ];

        return view('bungadavi.stocks.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Stock Management',
            'subtitle'      => 'Form Stock',
            'description'   => 'For Management Stock',
            'breadcrumb'    => ['Stock Management', 'Stock Form'],
            'guard'         => auth()->user()->group,
            'data'          => Stock::findOrFail($id),
            'units'         => Unit::pluck('name', 'id')
        ];

        return view('bungadavi.stocks.form', $data);
    }

    public function update(StockRequest $request, $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->type_stock  = $request->type_stock;
        $stock->name_stock  = $request->name_stock;
        $stock->qty_stock   = $request->qty_stock;

        if ($request->hasFile('image_stock')) {
            @unlink($stock->image_stock);
            $name = Str::random(4) . '_' . str_replace(' ', '', $request->file('image_stock')->getClientOriginalName());
            $stock->image_stock = $request->image_stock->storeAs('image_stock', $name, 'public');
        }

        $stock->save();

        return redirect()->route('bungadavi.stocks.index')->with('info', 'Stock '.$request->name_stock.' Has Been Updated');
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        return $stock->delete();
    }

    public function getStocks()
    {
        return response()
            ->json(
                Stock::where('is_active', 1)->get(),
            200);
    }
}
