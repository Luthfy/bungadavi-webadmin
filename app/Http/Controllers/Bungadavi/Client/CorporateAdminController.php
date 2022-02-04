<?php

namespace App\Http\Controllers\Bungadavi\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Client\CorporateAdminDataTable;

class CorporateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CorporateAdminDataTable $datatables)
    {
        $this->authorize("view corporate admin");
        $data = [
            'title'         => 'Corporate Admin Management',
            'subtitle'      => 'Corporate Admin',
            'description'   => 'For Management Corporate Admin',
            'breadcrumb'    => ['Corporate Admin Management', 'Corporate Admin List'],
            'button'        => ['name' => 'Add Corporate Admin', 'link' => 'bungadavi.corporateadmin.create'],
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
        // $this->authorize("create florist admin");
        $data = [
            'title'         => 'Corporate Admin Management',
            'subtitle'      => 'Form Corporate Admin',
            'description'   => 'For Management Corporate Admin User',
            'breadcrumb'    => ['Corporate Admin Management', 'Form Corporate Admin'],
            'guard'         => auth()->user()->group,
            'data'          => null
        ];

        return view('bungadavi.client.corporateadmin.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_type' => 'corporate']);
        $request->merge([ 'password' => bcrypt($request->password) ]);

        $florist = User::create($request->all());
        $florist->assignRole('corporate');

        return redirect()->route('bungadavi.corporateadmin.index')->with('info', 'Corporate Admin Has Been Added');
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
        // $this->authorize("edit florist admin");
        $data = [
            'title'         => 'Corporate Admin Management',
            'subtitle'      => 'Form Corporate Admin',
            'description'   => 'For Management Corporate Admin User',
            'breadcrumb'    => ['Corporate Admin Management', 'Form Corporate Admin'],
            'guard'         => auth()->user()->group,
            'data'          => User::where('uuid',$id)->first()
        ];

        return view('bungadavi.client.corporateadmin.form', $data);
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

        $corporateadmin = User::where('uuid',$id)->first();
        $corporateadmin->update($request->all());

        return redirect()->route('bungadavi.corporateadmin.index')->with('info', 'Corporate Admin Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->authorize("delete florist admin");
        return $corporateadmin = User::where('uuid',$id)->first()->delete();
    }
}
