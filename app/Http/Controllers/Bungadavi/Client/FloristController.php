<?php

namespace App\Http\Controllers\Bungadavi\Client;

use Illuminate\Http\Request;
use App\Models\Client\Florist;
use App\Http\Controllers\Controller;
use App\DataTables\Client\FloristDataTable;
use App\Http\Requests\Client\FloristRequest;
use App\Models\Client\FloristBank;

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
            'data'          => null
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
        $florist = Florist::create($request->except(["bank_name","bank_account_number","bank_beneficiary","bank_branch"]));

        $request->request->add(["client_florist_uuid" => $florist->uuid]);
        FloristBank::create($request->only(["bank_name","bank_account_number","bank_beneficiary","bank_branch","client_florist_uuid"]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
