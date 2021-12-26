<?php

namespace App\Http\Controllers\Bungadavi\Location;

use App\DataTables\Location\DistrictDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location\District;
use App\Http\Requests\Location\DistrictRequest;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Province;

class DistrictController extends Controller
{
    public function __construct()
    {

    }

    public function index(DistrictDataTable $datatables)
    {
        $data = [
            'title'         => 'District',
            'subtitle'      => 'District',
            'description'   => 'For Management district',
            'breadcrumb'    => ['Location', 'District'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.district.create'],
            'guard' => auth()->user()->group
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'District Management',
            'subtitle'      => 'Form District',
            'description'   => 'For Management District',
            'breadcrumb'    => ['District Management', 'Form District'],
            'guard'         => auth()->user()->group,
            'data'          => null
        ];

        return view('bungadavi.location.district', $data);
    }

    public function store(DistrictRequest $request)
    {
        District::create($request->only('country_id','province_id','city_id','name','jne_code','sicepat_code'));

        return redirect()->route('bungadavi.district.index')->with('info', 'District Has Been Added');
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
        foreach(City::all() as $city){
            $city_selected[$city->id] = $city->name;
        }
        $data = [
            'title'         => 'District Management',
            'subtitle'      => 'Form District',
            'description'   => 'For Management District',
            'breadcrumb'    => ['District Management', 'Form District'],
            'guard' => auth()->user()->group,
            'data'  => District::find($id),
            'country' => $country_selected,
            'province' => $province_selected,
            'city' => $city_selected,
        ];

        return view('bungadavi.location.district', $data);
    }

    public function update(DistrictRequest $request, $id)
    {
        $district = District::find($id);
        $district->country_id = $request->country_id;
        $district->province_id = $request->province_id;
        $district->city_id = $request->city_id;
        $district->name = $request->name;
        $district->jne_code = $request->jne_code;
        $district->sicepat_code = $request->sicepat_code;
        $district->save();

        return redirect()->route('bungadavi.district.index')->with('info', 'District Has Been Updated');
    }

    public function destroy($id)
    {
        return District::find($id)->delete();
    }

    public function getDistricts()
    {
        $countryId  = $_GET['country-id'];
        $provinceId = $_GET['province-id'];
        $cityId     = $_GET['city-id'];

        return response()
            ->json(
                District::where('country_id', $countryId)->where('province_id', $provinceId)->where('city_id', $cityId)->get(),
            200);
    }
}
