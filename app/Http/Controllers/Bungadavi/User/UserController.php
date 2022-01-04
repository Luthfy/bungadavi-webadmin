<?php

namespace App\Http\Controllers\Bungadavi\User;

use App\DataTables\User\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $datatables)
    {
        $data = [
            'title'         => 'User Admin Management',
            'subtitle'      => 'User Admin List',
            'description'   => 'For Management List User Admin',
            'breadcrumb'    => ['User Admin Management', 'User Admin List'],
            'button'        => ['name' => 'Add User', 'link' => 'bungadavi.users.create'],
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
            'title'         => 'Form User Admin Management',
            'subtitle'      => 'User Admin Form',
            'description'   => 'For Management Form User Admin',
            'breadcrumb'    => ['User Admin Management', 'User Admin Form'],
            'data'          => null
        ];

        return view('bungadavi.users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_type' => 'bungadavi']);
        $request->merge([ 'password' => bcrypt($request->password) ]);

        $florist = User::create($request->all());
        $florist->assignRole('bungadavi');

        return redirect()->route('bungadavi.users.index')->with('info', 'Admin Has Been Added');
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
        $data = [
            'title'         => 'Form User Admin Management',
            'subtitle'      => 'User Admin Form',
            'description'   => 'For Management Form User Admin',
            'breadcrumb'    => ['User Admin Management', 'User Admin Form'],
            'data'          => User::where('uuid',$id)->first()
        ];

        return view('bungadavi.users.form', $data);
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
        $request->merge(['password' => bcrypt($request->password) ]);

        $florist = User::where('uuid', $id)->first();
        $florist->update($request->all());

        return redirect()->route('bungadavi.users.index')->with('info', 'User Admin Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $user = User::where('uuid', $id)->first()->delete();
    }
}
