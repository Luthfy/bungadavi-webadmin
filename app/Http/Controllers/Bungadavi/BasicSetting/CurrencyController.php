<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\CurrencyDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\CurrencyRequest;
use App\Models\BasicSetting\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct()
    {

    }

    public function index(CurrencyDataTable $datatables)
    {
        $this->authorize("view currency");
        $data = [
            'title'         => 'Currency',
            'subtitle'      => 'Currency',
            'description'   => 'For Management currency',
            'breadcrumb'    => ['Basic Setting', 'Currency'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.currency.create'],
            'guard' => auth()->user()->group
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
        $this->authorize("create currency");
        $data = [
            'title'         => 'Currency Management',
            'subtitle'      => 'Form Currency',
            'description'   => 'For Management Currency',
            'breadcrumb'    => ['Currency Management', 'Form Currency'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.currency', $data);
    }

    public function store(CurrencyRequest $request)
    {
        Currency::create($request->only('name','code','symbol'));

        return redirect()->route('bungadavi.currency.index')->with('info', 'Currency Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit currency");
        $data = [
            'title'         => 'Currency Management',
            'subtitle'      => 'Form Currency',
            'description'   => 'For Management Currency',
            'breadcrumb'    => ['Currency Management', 'Form Currency'],
            'guard' => auth()->user()->group,
            'data'  => Currency::find($id),
        ];

        return view('bungadavi.basicsetting.currency', $data);
    }

    public function update(CurrencyRequest $request, $id)
    {
        $currency = Currency::find($id);
        $currency->name = $request->name;
        $currency->code = $request->code;
        $currency->symbol = $request->symbol;
        $currency->save();

        return redirect()->route('bungadavi.currency.index')->with('info', 'Currency Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete currency");
        return Currency::find($id)->delete();
    }
}
