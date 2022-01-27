<?php

namespace App\Http\Controllers\Bungadavi\Client;

use App\DataTables\Client\CorporateDataTable;
use Illuminate\Http\Request;
use App\Models\Client\Corporate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;

class CorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CorporateDataTable $datatables)
    {
        $this->authorize("view corporate");
        $data = [
            'title'         => 'Corporate Management',
            'subtitle'      => 'Corporate List',
            'description'   => 'For Management Corporate',
            'breadcrumb'    => ['Corporate Management', 'Corporate List'],
            'button'        => ['name' => 'Add Corporate', 'link' => 'bungadavi.corporate.create'],
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
        $this->authorize("create corporate");
        $data = [
            'title'         => 'Corporate Management',
            'subtitle'      => 'Form Corporate',
            'description'   => 'For Management Corporate',
            'breadcrumb'    => ['Corporate Management', 'Form Corporate'],
            'guard'         => auth()->user()->group,
            'data'          => null
        ];

        return view('bungadavi.client.corporate.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('npwp_image')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('npwp_image')->getClientOriginalName());
            $filePath = $request->npwp_image->storeAs('corporate',$name,'public');
        }

        Corporate::create([
            'fullname' => $request->fullname,
            'owner' => $request->owner,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'website' => $request->website,
            'legal_type' => $request->legal_type,
            'npwp' => $request->npwp,
            'npwp_image' => $filePath != null ? $filePath : null,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'zipcode_id' => $request->zipcode_id,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('bungadavi.corporate.index')->with('info', 'Corporate Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize("view corporate");
        $data = Corporate::findOrFail($id);
        $get_country = Country::where('id', $data->country_id)->first();
        $get_province = Province::where('id',$data->province_id)->first();
        $get_city = City::where('id',$data->city_id)->first();
        $get_district = District::where('id',$data->district_id)->first();
        $get_village = Village::where('id',$data->village_id)->first();
        $get_zipcode = ZipCode::where('id',$data->zipcode_id)->first();

        $data = [
            'title'         => 'Corporate Management',
            'subtitle'      => 'Form Corporate',
            'description'   => 'For Management Corporate',
            'breadcrumb'    => ['Corporate Management', 'Form Corporate'],
            'guard'         => auth()->user()->group,
            'data'          => $data,
            'country'       => $get_country,
            'province'      => $get_province,
            'city'          => $get_city,
            'district'      => $get_district,
            'village'       => $get_village,
            'zipcode'       => $get_zipcode,
        ];

        return view('bungadavi.client.corporate.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize("edit corporate");

        $data = [
            'title'         => 'Corporate Management',
            'subtitle'      => 'Form Corporate',
            'description'   => 'For Management Corporate',
            'breadcrumb'    => ['Corporate Management', 'Form Corporate'],
            'guard'         => auth()->user()->group,
            'data'          => Corporate::findOrFail($id),

        ];

        return view('bungadavi.client.corporate.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $florist = Corporate::findOrFail($id);
        $florist->fullname = $request->fullname;
        $florist->owner = $request->owner;
        $florist->email = $request->email;
        $florist->website = $request->website;
        $florist->phone = $request->phone;
        $florist->mobile = $request->mobile;
        $florist->legal_type = $request->legal_type;
        $florist->npwp = $request->npwp;
        if($request->hasFile('npwp_image')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('npwp_image')->getClientOriginalName());
            $florist->npwp_image = $request->npwp_image->storeAs('florist',$name,'public');
        }
        $florist->address = $request->address;
        $florist->latitude = $request->latitude;
        $florist->longitude = $request->longitude;
        $florist->country_id = $request->country_id;
        $florist->province_id = $request->province_id;
        $florist->city_id = $request->city_id;
        $florist->district_id = $request->district_id;
        $florist->village_id = $request->village_id;
        $florist->zipcode_id = $request->zipcode_id;
        $florist->is_active = $request->is_active;
        $florist->save();

        return redirect()->route('bungadavi.corporate.index')->with('info', 'Corporate Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize("delete corporate");
        return Corporate::find($id)->delete();
    }

    public function list(Request $request)
    {
        return response()->json(
            Corporate::all()
        );
    }
}
