<?php

namespace App\Http\Controllers\Bungadavi\Location;

use App\DataTables\Location\ZipCodeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Location\ZipCode;
use App\Http\Requests\Location\ZipCodeRequest;

class ZipCodeController extends Controller
{
    public function __construct()
    {

    }

    public function index(ZipCodeDataTable $datatables)
    {
        $data = [
            'title'         => 'Zip Code',
            'subtitle'      => 'Zip Code',
            'description'   => 'For Management zip code',
            'breadcrumb'    => ['Location', 'Zip Code'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.zipcode.create'],
            'guard' => auth()->user()->group
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function create()
    {

        $data = [
            'title'         => 'Zip Code Management',
            'subtitle'      => 'Form Zip Code',
            'description'   => 'For Management Zip Code',
            'breadcrumb'    => ['Zip Code Management', 'Form Zip Code'],
            'guard' => auth()->user()->group,
            'data'  => null
        ];

        return view('bungadavi.location.zipcode', $data);
    }

    public function store(ZipCodeRequest $request)
    {
        ZipCode::create($request->only('country_id','province_id','city_id','district_id','village_id','postal_code'));

        return redirect()->route('bungadavi.zipcode.index')->with('info', 'Zip Code Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data = [
            'title'         => 'Zip Code Management',
            'subtitle'      => 'Form Zip Code',
            'description'   => 'For Management Zip Code',
            'breadcrumb'    => ['Zip Code Management', 'Form Zip Code'],
            'guard' => auth()->user()->group,
            'data'  => ZipCode::find($id)
        ];

        return view('bungadavi.location.zipcode', $data);
    }

    public function update(ZipCodeRequest $request, $id)
    {
        $zipcode = ZipCode::find($id);
        $zipcode->country_id = $request->country_id;
        $zipcode->province_id = $request->province_id;
        $zipcode->city_id = $request->city_id;
        $zipcode->district_id = $request->district_id;
        $zipcode->village_id = $request->village_id;
        $zipcode->postal_code = $request->postal_code;
        $zipcode->save();

        return redirect()->route('bungadavi.zipcode.index')->with('info', 'Zip Code Has Been Updated');
    }

    public function destroy($id)
    {
        return ZipCode::find($id)->delete();
    }

    public function getZipCodes()
    {
        $countryId  = $_GET['country-id'];
        $provinceId = $_GET['province-id'];
        $cityId     = $_GET['city-id'];
        $districtId = $_GET['district-id'];
        $villageId  = $_GET['village-id'];

        return response()
            ->json(
                ZipCode::where('country_id', $countryId)->where('province_id', $provinceId)->where('city_id', $cityId)->where('district_id', $districtId)->where('village_id', $villageId)->get(),
            200);
    }

}
