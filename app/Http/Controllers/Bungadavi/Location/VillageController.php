<?php

namespace App\Http\Controllers\Bungadavi\Location;

use App\DataTables\Location\VillageDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location\Village;
use App\Http\Requests\Location\VillageRequest;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\District;
use App\Models\Location\Province;

class VillageController extends Controller
{
    public function __construct()
    {

    }

    public function index(VillageDataTable $datatables)
    {
        $this->authorize("view village");
        $data = [
            'title'         => 'Village',
            'subtitle'      => 'Village',
            'description'   => 'For Management village',
            'breadcrumb'    => ['Location', 'Village'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.village.create'],
            'guard' => auth()->user()->group
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function create()
    {
        $this->authorize("create village");
        foreach(Country::all() as $country){
            $country_selected[$country->id] = $country->name;
        }
        foreach(Province::all() as $province){
            $province_selected[$province->id] = $province->name;
        }
        foreach(City::all() as $city){
            $city_selected[$city->id] = $city->name;
        }
        foreach(District::all() as $district){
            $district_selected[$district->id] = $district->name;
        }
        $data = [
            'title'         => 'Village Management',
            'subtitle'      => 'Form Village',
            'description'   => 'For Management Village',
            'breadcrumb'    => ['Village Management', 'Form Village'],
            'guard' => auth()->user()->group,
            'data'  => null,
            'country' => $country_selected,
            'province' => $province_selected,
            'city' => $city_selected,
            'district' => $district_selected,
        ];

        return view('bungadavi.location.village', $data);
    }

    public function store(VillageRequest $request)
    {
        Village::create($request->only('country_id','province_id','city_id','district_id','name'));

        return redirect()->route('bungadavi.village.index')->with('info', 'Village Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit village");
        foreach(Country::all() as $country){
            $country_selected[$country->id] = $country->name;
        }
        foreach(Province::all() as $province){
            $province_selected[$province->id] = $province->name;
        }
        foreach(City::all() as $city){
            $city_selected[$city->id] = $city->name;
        }
        foreach(District::all() as $district){
            $district_selected[$district->id] = $district->name;
        }
        $data = [
            'title'         => 'Village Management',
            'subtitle'      => 'Form Village',
            'description'   => 'For Management Village',
            'breadcrumb'    => ['Village Management', 'Form Village'],
            'guard' => auth()->user()->group,
            'data'  => Village::find($id),
            'country' => $country_selected,
            'province' => $province_selected,
            'city' => $city_selected,
            'district' => $district_selected,
        ];

        return view('bungadavi.location.village', $data);
    }

    public function update(VillageRequest $request, $id)
    {
        $village = Village::find($id);
        $village->country_id = $request->country_id;
        $village->province_id = $request->province_id;
        $village->city_id = $request->city_id;
        $village->district_id = $request->district_id;
        $village->name = $request->name;
        $village->save();

        return redirect()->route('bungadavi.village.index')->with('info', 'Village Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete village");
        return Village::find($id)->delete();
    }

    public function getVillages()
    {
        $countryId  = $_GET['country-id'];
        $provinceId = $_GET['province-id'];
        $cityId     = $_GET['city-id'];
        $districtId = $_GET['district-id'];

        return response()
            ->json(
                Village::where('country_id', $countryId)->where('province_id', $provinceId)->where('city_id', $cityId)->where('district_id', $districtId)->get(),
            200);
    }
}
