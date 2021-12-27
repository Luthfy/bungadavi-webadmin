<?php

namespace App\Http\Controllers\Bungadavi\Client;

use Illuminate\Http\Request;
use App\Models\Location\City;
use App\Models\Client\Personal;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Http\Controllers\Controller;
use App\DataTables\Client\PersonalDataTable;
use App\Http\Requests\Client\PersonalRequest;

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
        $user = Personal::create($request->post());

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
        $user = Personal::findOrFail($id);
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
        $personal->password = $request->password;
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
}
