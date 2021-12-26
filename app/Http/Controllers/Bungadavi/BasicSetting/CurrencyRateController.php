<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\CurrencyRateDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\CurrencyRateRequest;
use App\Models\BasicSetting\Currency;
use App\Models\BasicSetting\CurrencyRate;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{
    public function __construct()
    {

    }

    public function index(CurrencyRateDataTable $datatables)
    {
        $data = [
            'title'         => 'Currency Rate',
            'subtitle'      => 'Currency Rate',
            'description'   => 'For Management currency rate',
            'breadcrumb'    => ['Basic Setting', 'Currency Rate'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.currencyrate.create'],
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
        foreach(Currency::all() as $currencyFrom){
            $currencyFrom_selected[$currencyFrom->id] = $currencyFrom->name;
        }

        foreach(Currency::all() as $currencyTo){
            $currencyTo_selected[$currencyTo->id] = $currencyTo->name;
        }

        $data = [
            'title'         => 'Currency Rate Management',
            'subtitle'      => 'Form Currency Rate',
            'description'   => 'For Management Currency Rate',
            'breadcrumb'    => ['Currency Rate Management', 'Form Currency Rate'],
            'guard' => auth()->user()->group,
            'data'  => null,
            'currencyFrom' => $currencyFrom_selected,
            'currencyTo' => $currencyTo_selected,

        ];

        return view('bungadavi.basicsetting.currencyrate', $data);
    }

    public function store(CurrencyRateRequest $request)
    {
        CurrencyRate::create($request->only('currency_code_from_id','currency_code_to_id','value'));

        return redirect()->route('bungadavi.currencyrate.index')->with('info', 'Currency Rate Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        foreach(Currency::all() as $currencyFrom){
            $currencyFrom_selected[$currencyFrom->id] = $currencyFrom->name;
        }

        foreach(Currency::all() as $currencyTo){
            $currencyTo_selected[$currencyTo->id] = $currencyTo->name;
        }

        $data = [
            'title'         => 'Currency Rate Management',
            'subtitle'      => 'Form Currency Rate',
            'description'   => 'For Management Currency Rate',
            'breadcrumb'    => ['Currency Rate Management', 'Form Currency Rate'],
            'guard' => auth()->user()->group,
            'data'  => CurrencyRate::find($id),
            'currencyFrom' => $currencyFrom_selected,
            'currencyTo' => $currencyTo_selected,
        ];

        return view('bungadavi.basicsetting.currencyrate', $data);
    }

    public function update(CurrencyRateRequest $request, $id)
    {
        $currencyrate = CurrencyRate::find($id);
        $currencyrate->currency_code_from_id = $request->currency_code_from_id;
        $currencyrate->currency_code_to_id = $request->currency_code_to_id;
        $currencyrate->value = $request->value;
        $currencyrate->save();

        return redirect()->route('bungadavi.currencyrate.index')->with('info', 'Currency Rate Has Been Updated');
    }

    public function destroy($id)
    {
        return CurrencyRate::find($id)->delete();
    }
}
