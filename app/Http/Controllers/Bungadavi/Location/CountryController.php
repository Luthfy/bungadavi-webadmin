<?php

namespace App\Http\Controllers\Bungadavi\Location;

use App\DataTables\Location\CountryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\CountryRequest;
use App\Models\Location\Country;

class CountryController extends Controller
{

    public function __construct()
    {

    }

    public function index(CountryDataTable $datatables)
    {
        $this->authorize("view country");
        $data = [
            'title'         => 'Country',
            'subtitle'      => 'Country',
            'description'   => 'For Management country',
            'breadcrumb'    => ['Location', 'Country'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.country.create'],
            'guard' => auth()->user()->group
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function create()
    {
        $this->authorize("create country");
        $data = [
            'title'         => 'Country Management',
            'subtitle'      => 'Form Country',
            'description'   => 'For Management Country',
            'breadcrumb'    => ['Country Management', 'Form Country'],
            'guard' => auth()->user()->group,
            'data'  => null
        ];

        return view('bungadavi.location.country', $data);
    }

    public function store(CountryRequest $request)
    {
        Country::create($request->only('code','name','base_curr_name','base_curr_code','base_curr_symbol'));

        return redirect()->route('bungadavi.country.index')->with('info', 'Country Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit country");
        $data = [
            'title'         => 'Country Management',
            'subtitle'      => 'Form Country',
            'description'   => 'For Management Country',
            'breadcrumb'    => ['Country Management', 'Form Country'],
            'guard' => auth()->user()->group,
            'data'  => Country::find($id)
        ];

        return view('bungadavi.location.country', $data);
    }

    public function update(CountryRequest $request, $id)
    {
        $country = Country::find($id);
        $country->code = $request->code;
        $country->name = $request->name;
        $country->base_curr_name = $request->base_curr_name;
        $country->base_curr_code = $request->base_curr_code;
        $country->base_curr_symbol = $request->base_curr_symbol;
        $country->save();

        return redirect()->route('bungadavi.country.index')->with('info', 'Country Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete country");
        return Country::find($id)->delete();
    }

    public function getCountries()
    {
        return response()
            ->json(
                Country::all(),
                200);
    }
}
