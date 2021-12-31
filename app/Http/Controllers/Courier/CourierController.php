<?php

namespace App\Http\Controllers\Courier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Courier\CourierDataTable;
use App\Http\Requests\Courier\CourierRequest;
use App\Models\Client\Florist;
use App\Models\Courier\Courier;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use Illuminate\Support\Str;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourierDataTable $datatables)
    {
        $data = [
            'title'         => 'Courier Management',
            'subtitle'      => 'Courier List',
            'description'   => 'For Management Courier',
            'breadcrumb'    => ['Courier Management', 'Courier List'],
            'button'        => ['name' => 'Add Courier', 'link' => 'bungadavi.courier.create'],
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
            'title'         => 'Courier Management',
            'subtitle'      => 'Courier List',
            'description'   => 'For Management Courier',
            'breadcrumb'    => ['Courier Management', 'Courier List'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'florist'      => $florist_selected,
        ];

        return view('bungadavi.courier.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourierRequest $request)
    {
        if($request->hasFile('ktp_images')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('ktp_images')->getClientOriginalName());
            $filePathKtp = $request->ktp_images->storeAs('courier',$name,'public');
        }

        if($request->hasFile('npwp_images')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('npwp_images')->getClientOriginalName());
            $filePathNpwp = $request->npwp_images->storeAs('courier',$name,'public');
        }

        if($request->hasFile('license_image')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('license_image')->getClientOriginalName());
            $filePathLicense = $request->license_image->storeAs('courier',$name,'public');
        }

        if($request->hasFile('photo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('photo')->getClientOriginalName());
            $filePathPhoto = $request->photo->storeAs('courier',$name,'public');
        }

        Courier::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'fullname' => $request->fullname,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'DOB' => $request->DOB,
            'marital_status' => $request->marital_status,
            'point' => $request->point,
            'ktp' => $request->ktp,
            'ktp_images' => $filePathKtp != null ? $filePathKtp : null,
            'npwp' => $request->npwp,
            'npwp_images' => $filePathNpwp != null ? $filePathNpwp : null,
            'license_type' => $request->license_type,
            'license_number' => $request->license_number,
            'license_image' => $filePathLicense != null ? $filePathLicense : null,
            'license_expired_date' => $request->license_expired_date,
            'address' => $request->address,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'village' => $request->village,
            'zipcode' => $request->zipcode,
            'join_date' => $request->join_date,
            'end_date' => $request->end_date,
            'contract_number' => $request->contract_number,
            'terminate_date' => $request->terminate_date,
            'terminate_description' => $request->terminate_description,
            'bank_name' => $request->bank_name,
            'bank_beneficiary_name' => $request->bank_beneficiary_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_branch' => $request->bank_branch,
            'photo' => $filePathPhoto != null ? $filePathPhoto : null,
            'fcm' => $request->fcm,
            'is_active' => $request->is_active,
            'florist_uuid' => $request->florist_uuid,
        ]);

        // return redirect()->route('personal.show', ['personal' => $user->uuid])->with('info', 'Customer Has Been Added');
        return redirect()->route('bungadavi.courier.index')->with('info', 'Courier Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        foreach(Florist::all() as $florist){
            $florist_selected[$florist->uuid] = $florist->fullname;
        }
        $data = Courier::findOrFail($id);
        $get_country = Country::where('id', $data->country)->first();
        $get_province = Province::where('id',$data->province)->first();
        $get_city = City::where('id',$data->city)->first();
        $get_district = District::where('id',$data->district)->first();
        $get_village = Village::where('id',$data->village)->first();
        $get_zipcode = ZipCode::where('id',$data->zipcode)->first();

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
            'florist'      => $florist_selected,
        ];

        return view('bungadavi.courier.show', $data);
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
            'title'         => 'Courier Management',
            'subtitle'      => 'Courier List',
            'description'   => 'For Management Courier',
            'breadcrumb'    => ['Courier Management', 'Courier List'],
            'guard'         => auth()->user()->group,
            'data'          => Courier::findOrFail($id),
            'florist'      => $florist_selected,
        ];

        return view('bungadavi.courier.form', $data);
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
        $courier = Courier::findOrFail($id);
        $courier->username = $request->username;
        $courier->email = $request->email;
        $courier->password = $request->password;
        $courier->fullname = $request->fullname;
        $courier->mobile = $request->mobile;
        $courier->gender = $request->gender;
        $courier->DOB = $request->DOB;
        $courier->marital_status = $request->marital_status;
        $courier->point = $request->point;
        $courier->ktp = $request->ktp;
        if($request->hasFile('ktp_images')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('ktp_images')->getClientOriginalName());
            $courier->ktp_images = $request->ktp_images->storeAs('courier',$name,'public');
        }
        $courier->npwp = $request->npwp;
        if($request->hasFile('npwp_images')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('npwp_images')->getClientOriginalName());
            $courier->npwp_images = $request->npwp_images->storeAs('courier',$name,'public');
        }
        $courier->license_type = $request->license_type;
        $courier->license_number = $request->license_number;
        if($request->hasFile('license_image')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('license_image')->getClientOriginalName());
            $courier->license_image = $request->license_image->storeAs('courier',$name,'public');
        }
        $courier->license_expired_date = $request->license_expired_date;
        $courier->address = $request->address;
        $courier->country = $request->country;
        $courier->province = $request->province;
        $courier->city = $request->city;
        $courier->district = $request->district;
        $courier->village = $request->village;
        $courier->zipcode = $request->zipcode;
        $courier->join_date = $request->join_date;
        $courier->end_date = $request->end_date;
        $courier->contract_number = $request->contract_number;
        $courier->terminate_date = $request->terminate_date;
        $courier->terminate_description = $request->terminate_description;
        $courier->bank_name = $request->bank_name;
        $courier->bank_beneficiary_name = $request->bank_beneficiary_name;
        $courier->bank_account_number = $request->bank_account_number;
        $courier->bank_branch = $request->bank_branch;
        if($request->hasFile('photo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('photo')->getClientOriginalName());
            $courier->photo = $request->photo->storeAs('courier',$name,'public');
        }
        $courier->fcm = $request->fcm;
        $courier->is_active = $request->is_active;
        $courier->florist_uuid = $request->florist_uuid;
        $courier->save();

        // return redirect()->route('personal.show', ['personal' => $user->uuid])->with('info', 'Customer Has Been Added');
        return redirect()->route('bungadavi.courier.index')->with('info', 'Courier Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Courier::find($id)->delete();
    }


}
