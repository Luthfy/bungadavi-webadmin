<?php

namespace App\Http\Controllers\Bungadavi\Location;

use App\DataTables\Location\CityDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Http\Requests\Location\CityRequest;
use App\Models\Location\Province;

class CityController extends Controller
{
    public function __construct()
    {

    }

    public function index(CityDataTable $datatables)
    {
        $data = [
            'title'         => 'City',
            'subtitle'      => 'City',
            'description'   => 'For Management city',
            'breadcrumb'    => ['Location', 'City'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.city.create'],
            'guard'         => auth()->user()->group
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function create()
    {

        $data = [
            'title'         => 'City Management',
            'subtitle'      => 'Form City',
            'description'   => 'For Management City',
            'breadcrumb'    => ['Location', 'Form City'],
            'guard'         => auth()->user()->group,
            'data'          => null,
        ];

        // dd($data['country']->toArray());

        return view('bungadavi.location.city', $data);
    }

    public function store(CityRequest $request)
    {
        City::create($request->only('country_id','province_id','alias','name','code'));

        return redirect()->route('bungadavi.city.index')->with('info', 'City Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        foreach(Country::all() as $country){
            $country_selected[$country->id] = $country->name;
        }
        foreach(Province::all() as $province){
            $province_selected[$province->id] = $province->name;
        }
        $data = [
            'title'         => 'Group Management',
            'subtitle'      => 'Form Group',
            'description'   => 'For Management group user and menu user',
            'breadcrumb'    => ['Group Management', 'Form Group'],
            'guard' => auth()->user()->group,
            'data'  => City::find($id),
            'country' => $country_selected,
            'province' => $province_selected
        ];

        return view('bungadavi.location.city', $data);
    }

    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        $city->country_id = $request->country_id;
        $city->province_id = $request->province_id;
        $city->alias = $request->alias;
        $city->name = $request->name;
        $city->code = $request->code;
        $city->save();

        return redirect()->route('bungadavi.city.index')->with('info', 'City Has Been Updated');
    }

    public function destroy($id)
    {
        return City::find($id)->delete();
    }

    public function getCities()
    {
        $countryId  = $_GET['country-id'];
        $provinceId = $_GET['province-id'];

        return response()
            ->json(
                City::where('country_id', $countryId)->where('province_id', $provinceId)->get(),
            200);
    }
}
