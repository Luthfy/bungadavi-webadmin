<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\CurrencyRateDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\CurrencyRateRequest;
use App\Models\BasicSetting\Currency;
use App\Models\BasicSetting\CurrencyRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyRateController extends Controller
{

    public function index(CurrencyRateDataTable $datatables)
    {
        $this->authorize("view currency rate");
        $data = [
            'title'         => 'Currency Rate',
            'subtitle'      => 'Currency Rate',
            'description'   => 'For Management currency rate',
            'breadcrumb'    => ['Basic Setting', 'Currency Rate'],
            'button'        => ['name' => 'Get Currency Rate Today', 'link' => 'bungadavi.currency.today'],
            'guard' => auth()->user()->group
        ];

        // return $datatables->render('commons.datatable', $data);
        return $datatables->render('bungadavi.basicsetting.currencyrate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create currency rate");
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

        return view('bungadavi.basicsetting.currencyrate.form', $data);
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
        $this->authorize("edit currency rate");
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
        $this->authorize("delete currency rate");
        return CurrencyRate::find($id)->delete();
    }

    public function getCurrencyToday()
    {
        $currencyFrom = 'IDR';

        $url = 'https://freecurrencyapi.net/api/v2/latest?apikey=7e5aa390-7748-11ec-be71-9bf06bfb3007';

        $data = Http::get($url);

        if ($data->status() == 200) {
            foreach ($data->json("data") as $key => $value) {
                CurrencyRate::updateOrCreate(['currency_code_from_id' => $currencyFrom, 'currency_code_to_id' => $key],[
                    'value' => $value
                ]);
            }

            // return response(['status' => true, 'message' => 'already update']);
            return redirect()->back()->with('success', 'Already update');
        }

        return redirect()->back()->with('warning', 'Something is wrong or limits');

        // return response(['status' => false, 'message' => 'something is wrong', 'error' => json_decode($data, true)]);
    }

    public function updateCurrencyStatus(Request $request, $id)
    {
        $currency = CurrencyRate::findOrFail($id);
        $currency->is_active = $request->status;
        $currency->save();

        return response()->json(['message' => 'success']);
    }

    public function getAjaxActiveCurrency()
    {
        return CurrencyRate::where('is_active', 1)->get();
    }
}
