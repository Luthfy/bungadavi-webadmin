<?php

namespace App\Http\Controllers\Bungadavi\Client;

use App\DataTables\Client\FloristRecipientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\FloristRecipientRequest;
use App\Models\Client\Florist;
use App\Models\Client\FloristRecipient;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use Illuminate\Http\Request;

class FloristRecipientController extends Controller
{
    public function index(FloristRecipientDataTable $datatables)
    {
        $data = [
            'title'         => 'Florist Recipient Management',
            'subtitle'      => 'Florist Recipient',
            'description'   => 'For Management Florist Recipient',
            'breadcrumb'    => ['Florist Recipient Management', 'Florist Recipient List'],
            'button'        => ['name' => 'Add Florist Recipient', 'link' => 'bungadavi.floristrecipient.create'],
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
        foreach(Florist::all() as $florist){
            $florist_selected[$florist->uuid] = $florist->fullname;
        }

        $data = [
            'title'         => 'Florist Recipient Management',
            'subtitle'      => 'Form Florist Recipient',
            'description'   => 'For Management Florist Recipient',
            'breadcrumb'    => ['Florist Recipient Management', 'Form Florist Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'florist'      => $florist_selected,

        ];

        return view('bungadavi.client.floristrecipient.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FloristRecipientRequest $request)
    {
        FloristRecipient::create([
            'fullname' => $request->firstname,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'info_address' => $request->info_address,
            'country_id' => $request->country_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'zipcode_id' => $request->zipcode_id,
            'client_affiliate_uuid' => $request->client_affiliate_uuid,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('bungadavi.floristrecipient.index')->with('info', 'Florist Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_florist = FloristRecipient::with('florist')->get();
        $data = FloristRecipient::findOrFail($id);
        $get_country = Country::where('id', $data->country_id)->first();
        $get_province = Province::where('id',$data->province_id)->first();
        $get_city = City::where('id',$data->city_id)->first();
        $get_district = District::where('id',$data->district_id)->first();
        $get_village = Village::where('id',$data->village_id)->first();
        $get_zipcode = ZipCode::where('id',$data->zipcode_id)->first();

        $data = [
            'title'         => 'Florist Recipient Management',
            'subtitle'      => 'Form Florist Recipient',
            'description'   => 'For Management Florist Recipient',
            'breadcrumb'    => ['Florist Recipient Management', 'Form Florist Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => $data,
            'florist'       => $get_florist,
            'country'       => $get_country,
            'province'      => $get_province,
            'city'          => $get_city,
            'district'      => $get_district,
            'village'       => $get_village,
            'zipcode'       => $get_zipcode
        ];

        return view('bungadavi.client.floristrecipient.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        foreach(Florist::all() as $florist){
            $florist_selected[$florist->uuid] = $florist->fullname;
        }

        $data = [
            'title'         => 'Florist Recipient Management',
            'subtitle'      => 'Form Florist Recipient',
            'description'   => 'For Management Florist Recipient',
            'breadcrumb'    => ['Florist Recipient Management', 'Form Florist Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => FloristRecipient::findOrFail($id),
            'florist'       => $florist_selected,

        ];

        return view('bungadavi.client.floristrecipient.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FloristRecipientRequest $request, $id)
    {
        $floristrecipient = FloristRecipient::findOrFail($id);
        $floristrecipient->fullname = $request->fullname;
        $floristrecipient->email = $request->email;
        $floristrecipient->phone = $request->phone;
        $floristrecipient->mobile = $request->mobile;
        $floristrecipient->gender = $request->gender;
        $floristrecipient->latitude = $request->latitude;
        $floristrecipient->longitude = $request->longitude;
        $floristrecipient->address = $request->address;
        $floristrecipient->info_address = $request->info_address;
        $floristrecipient->country_id = $request->country_id;
        $floristrecipient->province_id = $request->province_id;
        $floristrecipient->city_id = $request->city_id;
        $floristrecipient->district_id = $request->district_id;
        $floristrecipient->village_id = $request->village_id;
        $floristrecipient->zipcode_id = $request->zipcode_id;
        $floristrecipient->client_affiliate_uuid = $request->client_affiliate_uuid;
        $floristrecipient->is_active = $request->is_active;
        $floristrecipient->save();

        return redirect()->route('bungadavi.floristrecipient.index')->with('info', 'Florist Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return FloristRecipient::find($id)->delete();
    }

    public function list(Request $request)
    {
        // if ($request->ajax()) {
            return response()->json(
                FloristRecipient::all()
            );
        // }
    }
}
