<?php

namespace App\Http\Controllers\Bungadavi\Client;

use App\DataTables\Client\CorporateRecipientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CorporateRecipientRequest;
use App\Models\Client\Corporate;
use App\Models\Client\CorporateRecipient;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use Illuminate\Http\Request;

class CorporateRecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CorporateRecipientDataTable $datatables)
    {
        $this->authorize("view corporate recipient");
        $data = [
            'title'         => 'Corporate Recipient Management',
            'subtitle'      => 'Corporate Recipient',
            'description'   => 'For Management Corporate Recipient',
            'breadcrumb'    => ['Corporate Recipient Management', 'Corporate Recipient List'],
            'button'        => ['name' => 'Add Corporate Recipient', 'link' => 'bungadavi.corporaterecipient.create'],
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
        // $this->authorize("create corporate recipient");
        foreach(Corporate::all() as $corporate){
            $corporate_selected[$corporate->uuid] = $corporate->fullname;
        }

        $data = [
            'title'         => 'Corporate Recipient Management',
            'subtitle'      => 'Form Corporate Recipient',
            'description'   => 'For Management Corporate Recipient',
            'breadcrumb'    => ['Corporate Recipient Management', 'Form Corporate Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => null,
            'corporate'     => $corporate_selected,

        ];

        return view('bungadavi.client.corporaterecipient.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorporateRecipientRequest $request)
    {
        CorporateRecipient::create([
            'fullname' => $request->fullname,
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

        return redirect()->route('bungadavi.corporaterecipient.index')->with('info', 'Corporate Recipient Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $this->authorize("view corporate recipient");
        $get_corporate  = CorporateRecipient::with('corporate')->get();
        $data           = CorporateRecipient::findOrFail($id);
        $get_country    = Country::where('id', $data->country_id)->first();
        $get_province   = Province::where('id',$data->province_id)->first();
        $get_city       = City::where('id',$data->city_id)->first();
        $get_district   = District::where('id',$data->district_id)->first();
        $get_village    = Village::where('id',$data->village_id)->first();
        $get_zipcode    = ZipCode::where('id',$data->zipcode_id)->first();

        $data = [
            'title'         => 'Corporate Recipient Management',
            'subtitle'      => 'Form Corporate Recipient',
            'description'   => 'For Management Corporate Recipient',
            'breadcrumb'    => ['Corporate Recipient Management', 'Form Corporate Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => $data,
            'corporate'     => $get_corporate,
            'country'       => $get_country,
            'province'      => $get_province,
            'city'          => $get_city,
            'district'      => $get_district,
            'village'       => $get_village,
            'zipcode'       => $get_zipcode
        ];

        return view('bungadavi.client.corporaterecipient.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $this->authorize("edit corporate recipient");
        foreach(Corporate::all() as $corporate){
            $corporate_selected[$corporate->uuid] = $corporate->fullname;
        }

        $data = [
            'title'         => 'Corporate Recipient Management',
            'subtitle'      => 'Form Corporate Recipient',
            'description'   => 'For Management Corporate Recipient',
            'breadcrumb'    => ['Corporate Recipient Management', 'Form Corporate Recipient'],
            'guard'         => auth()->user()->group,
            'data'          => CorporateRecipient::findOrFail($id),
            'corporate'     => $corporate_selected,

        ];

        return view('bungadavi.client.corporaterecipient.form', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->authorize("delete corporate recipient");
        return CorporateRecipient::find($id)->delete();
    }
}
