<?php

namespace App\Http\Controllers\Bungadavi\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Client\FloristAdminDataTable;

class FloristAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FloristAdminDataTable $datatables)
    {
        $this->authorize("view florist admin");
        $data = [
            'title'         => 'Customer Florist Admin Management',
            'subtitle'      => 'Customer Florist Admin List',
            'description'   => 'For Management Customer Florist User Admin',
            'breadcrumb'    => ['Customer Florist Admin Management', 'Customer Florist Admin List'],
            'button'        => ['name' => 'Add Florist', 'link' => 'bungadavi.floristadmin.create'],
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
        $this->authorize("create florist admin");
        $data = [
            'title'         => 'Customer Florist Admin Management',
            'subtitle'      => 'Form Customer Florist Admin',
            'description'   => 'For Management Customer Florist Admin User',
            'breadcrumb'    => ['Customer Florist Admin Management', 'Form Customer Florist Admin'],
            'guard'         => auth()->user()->group,
            'data'          => null
        ];

        return view('bungadavi.client.floristadmin.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_type' => 'affiliate']);
        $request->merge([ 'password' => bcrypt($request->password) ]);

        $florist = User::create($request->all());
        $florist->assignRole('affiliate');

        return redirect()->route('bungadavi.floristadmin.index')->with('info', 'Florist Admin Has Been Added');
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
        $this->authorize("edit florist admin");
        $data = [
            'title'         => 'Customer Florist Admin Management',
            'subtitle'      => 'Form Customer Florist Admin',
            'description'   => 'For Management Customer Florist Admin User',
            'breadcrumb'    => ['Customer Florist Admin Management', 'Form Customer Florist Admin'],
            'guard'         => auth()->user()->group,
            'data'          => User::where('uuid',$id)->first()
        ];

        return view('bungadavi.client.floristadmin.form', $data);
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
        $request->merge([ 'password' => bcrypt($request->password) ]);

        $florist = User::where('uuid',$id)->first();
        $florist->update($request->all());

        return redirect()->route('bungadavi.floristadmin.index')->with('info', 'Florist Admin Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize("delete florist admin");
        return $florist = User::where('uuid',$id)->first()->delete();

    }
}
