<?php

namespace App\Http\Controllers\Bungadavi\Client;

use App\DataTables\Client\PersonalRecipientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\PersonalRecipientRequest;
use App\Models\Client\Personal;
use App\Models\Client\PersonalRecipient;
use Illuminate\Http\Request;

class PersonalRecipientController extends Controller
{
    public function index(PersonalRecipientDataTable $datatables)
    {
        $data = [
            'title'         => 'Customer Personal Recipient Management',
            'subtitle'      => 'Customer Personal Recipient List',
            'description'   => 'For Management Customer Personal Recipient',
            'breadcrumb'    => ['Customer Personal Recipient Management', 'Customer Personal Recipient List'],
            'button'        => ['name' => 'Add Customer', 'link' => 'bungadavi.personalrecipient.create'],
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
        foreach(Personal::all() as $personal){
            $personal_selected[$personal->uuid] = $personal->fullname;
        }

        $data = [
            'title'         => 'Customer Personal Recipient Management',
            'subtitle'      => 'Form Customer Personal Recipient',
            'description'   => 'For Management Customer Personal Recipient',
            'breadcrumb'    => ['Customer Personal Recipient Management', 'Form Customer Personal Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'personal'      => $personal_selected,
        ];

        return view('bungadavi.client.personalrecipient.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalRecipientRequest $request)
    {
        // $user = Personal::create($request->post());
        PersonalRecipient::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'country_id' => $request->country_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'zipcode_id' => $request->zipcode_id,
            'client_personal_uuid' => $request->client_personal_uuid,
            'is_active' => $request->is_active,
        ]);

        // return redirect()->route('personal.show', ['personal' => $user->uuid])->with('info', 'Customer Has Been Added');
        return redirect()->route('bungadavi.personalrecipient.index')->with('info', 'Customer Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_personal = PersonalRecipient::with('clientPersonal')->get();
        $get_country = PersonalRecipient::with('country')->get();
        $get_province = PersonalRecipient::with('province')->get();
        $get_city = PersonalRecipient::with('city')->get();
        $get_district = PersonalRecipient::with('district')->get();
        $get_village = PersonalRecipient::with('village')->get();
        $get_zipcode = PersonalRecipient::with('zipcode')->get();

        $data = [
            'title'         => 'Customer Personal Recipient',
            'subtitle'      => 'Detail Customer Personal Recipient',
            'description'   => 'Detail Customer Personal Recipient',
            'breadcrumb'    => ['Customer Personal Recipient', 'Detail Customer Personal Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => PersonalRecipient::findOrFail($id),
            'personal'       => $get_personal,
            'country'       => $get_country,
            'province'      => $get_province,
            'city'          => $get_city,
            'district'      => $get_district,
            'village'       => $get_village,
            'zipcode'       => $get_zipcode,
        ];

        return view('bungadavi.client.personalrecipient.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        foreach(Personal::all() as $personal){
            $personal_selected[$personal->uuid] = $personal->fullname;
        }
        $data = [
            'title'         => 'Customer Personal Recipient Management',
            'subtitle'      => 'Form Customer Personal Recipient',
            'description'   => 'For Management Customer Personal Recipient',
            'breadcrumb'    => ['Customer Personal Recipient Management', 'Form Customer Personal Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => PersonalRecipient::findOrFail($id),
            'personal'      => $personal_selected,
        ];

        return view('bungadavi.client.personalrecipient.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalRecipientRequest $request, $id)
    {
        $personalrecipient = PersonalRecipient::findOrFail($id);
        $personalrecipient->firstname = $request->firstname;
        $personalrecipient->lastname = $request->lastname;
        $personalrecipient->email = $request->email;
        $personalrecipient->phone = $request->phone;
        $personalrecipient->mobile = $request->mobile;
        $personalrecipient->gender = $request->gender;
        $personalrecipient->birthday = $request->birthday;
        $personalrecipient->latitude = $request->latitude;
        $personalrecipient->longitude = $request->longitude;
        $personalrecipient->address = $request->address;
        $personalrecipient->country_id = $request->country_id;
        $personalrecipient->province_id = $request->province_id;
        $personalrecipient->city_id = $request->city_id;
        $personalrecipient->district_id = $request->district_id;
        $personalrecipient->village_id = $request->village_id;
        $personalrecipient->zipcode_id = $request->zipcode_id;
        $personalrecipient->client_personal_uuid = $request->client_personal_uuid;
        $personalrecipient->is_active = $request->is_active;
        $personalrecipient->save();

        // return redirect()->route('personal.show', ['personal' => $user->uuid])->with('info', 'Customer Has Been Added');
        return redirect()->route('bungadavi.personalrecipient.index')->with('info', 'Customer Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return PersonalRecipient::find($id)->delete();
    }

    public function list($user)
    {
        // if ($request->ajax()) {
            return response()->json(
                PersonalRecipient::where('client_personal_uuid', $user)->get()
            );
        // }
    }
}
