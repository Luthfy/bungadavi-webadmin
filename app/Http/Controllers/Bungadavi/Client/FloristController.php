<?php

namespace App\Http\Controllers\Bungadavi\Client;

use Illuminate\Http\Request;
use App\Models\Client\Florist;
use App\Http\Controllers\Controller;
use App\DataTables\Client\FloristDataTable;
use App\Http\Requests\Client\FloristRequest;
use App\Models\Client\FloristBank;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use Illuminate\Support\Str;

class FloristController extends Controller
{
    public function index(FloristDataTable $datatables)
    {
        $data = [
            'title'         => 'Customer Florist Management',
            'subtitle'      => 'Customer Florist List',
            'description'   => 'For Management Customer Florist User',
            'breadcrumb'    => ['Customer Florist Management', 'Customer Florist List'],
            'button'        => ['name' => 'Add Florist', 'link' => 'bungadavi.florist.create'],
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
        $data = [
            'title'         => 'Customer Florist Management',
            'subtitle'      => 'Form Customer Florist',
            'description'   => 'For Management Customer Florist User',
            'breadcrumb'    => ['Customer Florist Management', 'Form Customer Florist'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'florist_bank'  => null
        ];

        return view('bungadavi.client.florist.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FloristRequest $request)
    {
        if($request->hasFile('npwp_image')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('npwp_image')->getClientOriginalName());
            $filePath = $request->npwp_image->storeAs('florist',$name,'public');
        }

        $florist = Florist::create([
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
            'point' => $request->point,
            'is_affiliate' => $request->is_affiliate,
            'is_special_feature_active' => $request->is_special_feature_active,
            'is_active' => $request->is_active,
            $request->except(["bank_name","bank_account_number","bank_beneficiary","bank_branch"])
        ]);

        $request->request->add(["client_florist_uuid" => $florist->uuid]);
        FloristBank::create($request->only(["bank_name","bank_account_number","bank_beneficiary","bank_branch","client_florist_uuid"]));
        return redirect()->route('bungadavi.florist.index')->with('info', 'Florist Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $florist_bank = FloristBank::where('client_florist_uuid',$id)->first();
        $data = Florist::findOrFail($id);
        $get_country = Country::where('id', $data->country_id)->first();
        $get_province = Province::where('id',$data->province_id)->first();
        $get_city = City::where('id',$data->city_id)->first();
        $get_district = District::where('id',$data->district_id)->first();
        $get_village = Village::where('id',$data->village_id)->first();
        $get_zipcode = ZipCode::where('id',$data->zipcode_id)->first();

        $data = [
            'title'         => 'Customer Florist Management',
            'subtitle'      => 'Form Customer Florist',
            'description'   => 'For Management Customer Florist User',
            'breadcrumb'    => ['Customer Florist Management', 'Form Customer Florist'],
            'guard'         => auth()->user()->group,
            'data'          => $data,
            'country'       => $get_country,
            'province'      => $get_province,
            'city'          => $get_city,
            'district'      => $get_district,
            'village'       => $get_village,
            'zipcode'       => $get_zipcode,
            'florist_bank'  => $florist_bank,
        ];

        return view('bungadavi.client.florist.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $florist_bank = FloristBank::where('client_florist_uuid',$id)->first();

        $data = [
            'title'         => 'Customer Florist Management',
            'subtitle'      => 'Form Customer Florist',
            'description'   => 'For Management Customer Florist User',
            'breadcrumb'    => ['Customer Florist Management', 'Form Customer Florist'],
            'guard'         => auth()->user()->group,
            'data'          => Florist::findOrFail($id),
            'florist_bank'  => $florist_bank,

        ];

        return view('bungadavi.client.florist.form', $data);
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
        $florist = Florist::findOrFail($id);
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
        $florist->point = $request->point;
        $florist->is_affiliate = $request->is_affiliate;
        $florist->is_special_feature_active = $request->is_special_feature_active;
        $florist->is_active = $request->is_active;
        $florist->save();

        $florist_bank = FloristBank::where('client_florist_uuid',$id)->first();
        $florist_bank->bank_name = $request->bank_name;
        $florist_bank->bank_account_number = $request->bank_account_number;
        $florist_bank->bank_beneficiary = $request->bank_beneficiary;
        $florist_bank->bank_branch = $request->bank_branch;
        $florist_bank->save();

        // return redirect()->route('personal.show', ['personal' => $user->uuid])->with('info', 'Customer Has Been Added');
        return redirect()->route('bungadavi.florist.index')->with('info', 'Florist Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FloristBank::where('client_florist_uuid',$id)->delete();
        return Florist::find($id)->delete();
    }

    public function list(Request $request)
    {
        // if ($request->ajax()) {
            return response()->json(
                Florist::all()
            );
        // }
    }
}
