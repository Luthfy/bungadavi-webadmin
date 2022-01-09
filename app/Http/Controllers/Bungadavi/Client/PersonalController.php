<?php

namespace App\Http\Controllers\Bungadavi\Client;

use Illuminate\Http\Request;
use App\Models\Client\Personal;
use App\Http\Controllers\Controller;
use App\DataTables\Client\PersonalDataTable;
use App\Http\Requests\Client\PersonalRequest;
use App\Models\Client\Corporate;
use App\Models\Customer\Affiliate;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;

class PersonalController extends Controller
{

    public function index(PersonalDataTable $datatables)
    {
        $data = [
            'title'         => 'Customer Personal Management',
            'subtitle'      => 'Customer Personal List',
            'description'   => 'For Management Customer Personal User',
            'breadcrumb'    => ['Customer Personal Management', 'Customer Personal List'],
            'button'        => ['name' => 'Add Customer', 'link' => 'bungadavi.personal.create'],
            'guard' => auth()->user()->group
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
            'title'         => 'Customer Personal Management',
            'subtitle'      => 'Form Customer Personal',
            'description'   => 'For Management Customer Personal User',
            'breadcrumb'    => ['Customer Personal Management', 'Form Customer Personal'],
            'guard'         => auth()->user()->group,
            'data'          => null
        ];

        return view('bungadavi.client.personal.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Personal::create($request->post());
        Personal::create([
            'fullname' => $request->fullname,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'zipcode_id' => $request->zipcode_id,
            'refferal' => $request->refferal,
            'sharelink' => $request->sharelink,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        // return redirect()->route('personal.show', ['personal' => $user->uuid])->with('info', 'Customer Has Been Added');
        return redirect()->route('bungadavi.personal.index')->with('info', 'Customer Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Personal::findOrFail($id);
        $get_country = Country::where('id', $data->country_id)->first();
        $get_province = Province::where('id',$data->province_id)->first();
        $get_city = City::where('id',$data->city_id)->first();
        $get_district = District::where('id',$data->district_id)->first();
        $get_village = Village::where('id',$data->village_id)->first();
        $get_zipcode = ZipCode::where('id',$data->zipcode_id)->first();

        $data = [
            'title'         => 'Customer Personal',
            'subtitle'      => 'Detail Customer Personal',
            'description'   => 'Detail Customer Personal User',
            'breadcrumb'    => ['Customer Personal', 'Detail Customer Personal'],
            'guard'         => auth()->user()->group,
            'data'          => $data,
            'country'       => $get_country,
            'province'      => $get_province,
            'city'          => $get_city,
            'district'      => $get_district,
            'village'       => $get_village,
            'zipcode'       => $get_zipcode,
        ];

        return view('bungadavi.client.personal.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title'         => 'Customer Personal Management',
            'subtitle'      => 'Form Customer Personal',
            'description'   => 'For Management Customer Personal User',
            'breadcrumb'    => ['Customer Personal Management', 'Form Customer Personal'],
            'guard'         => auth()->user()->group,
            'data'          => Personal::findOrFail($id)
        ];

        return view('bungadavi.client.personal.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalRequest $request, $id)
    {
        $personal = Personal::findOrFail($id);
        $personal->fullname = $request->fullname;
        $personal->firstname = $request->firstname;
        $personal->lastname = $request->lastname;
        $personal->phone = $request->phone;
        $personal->mobile = $request->mobile;
        $personal->gender = $request->gender;
        $personal->birthday = $request->birthday;
        $personal->address = $request->address;
        $personal->country_id = $request->country_id;
        $personal->province_id = $request->province_id;
        $personal->city_id = $request->city_id;
        $personal->district_id = $request->district_id;
        $personal->village_id = $request->village_id;
        $personal->zipcode_id = $request->zipcode_id;
        $personal->refferal = $request->refferal;
        $personal->sharelink = $request->sharelink;
        $personal->email = $request->email;
        $personal->username = $request->username;
        if($request->password != null || $request->password != '') {
            $personal->password = bcrypt($request->password);
        }
        $personal->save();

        // return redirect()->route('personal.show', ['personal' => $user->uuid])->with('info', 'Customer Has Been Added');
        return redirect()->route('bungadavi.personal.index')->with('info', 'Customer Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Personal::find($id)->delete();
    }

    public function list(Request $request)
    {
        // if ($request->ajax()) {
            return response()->json(
                Personal::select()->with('country', 'province', 'city', 'district', 'village', 'zipcode')->get()
            );
        // }
    }
}
