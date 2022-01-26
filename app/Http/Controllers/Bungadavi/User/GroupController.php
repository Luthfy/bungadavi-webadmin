<?php

namespace App\Http\Controllers\Bungadavi\User;

use App\Models\Menu\Group;
use App\Models\Menu\Submenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\User\GroupDataTable;
use App\Models\Menu\Position;
use App\Models\Menu\PositionHasMenu;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupDataTable $datatables)
    {
        $this->authorize("view user group");
        $data = [
            'title'         => 'User Group Position Management',
            'subtitle'      => 'User Group Position List',
            'description'   => 'For Management List Group Position Admin',
            'breadcrumb'    => ['User Group Admin Position Management', 'User Group Admin Position List'],
            'button'        => ['name' => 'Add Group', 'link' => 'bungadavi.groups.create'],
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
        $this->authorize("create user group");
        $data = [
            'title'         => 'Form User Admin Management',
            'subtitle'      => 'User Admin Form',
            'description'   => 'For Management Form User Admin',
            'breadcrumb'    => ['User Admin Management', 'User Admin Form'],
            'menu'          => Group::all(),
            'data'          => null,
        ];

        return view('bungadavi.groups.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $positionId = Position::create($request->only('name'))->id;
        foreach ($request->menus as $menuId) {
            $value = Submenu::where('uuid', $menuId)->select("uuid as submenu_uuid", "menu_uuid", 'groups_uuid')->first()->toArray();
            $value['position_id'] = $positionId;
            PositionHasMenu::create($value);
        }

        return redirect()->route('bungadavi.groups.index')->with('info', 'Group Has Been Added');

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
        $this->authorize("edit user group");
        $data = [
            'title'         => 'Form User Admin Management',
            'subtitle'      => 'User Admin Form',
            'description'   => 'For Management Form User Admin',
            'breadcrumb'    => ['User Admin Management', 'User Admin Form'],
            'menu'          => Group::all(),
            'data'          => Position::findOrFail($id),
        ];

        return view('bungadavi.groups.form', $data);
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
        $positoin = Position::findOrFail($id);
        $positoin->name = $request->name;
        $positoin->save();

        PositionHasMenu::where('position_id', $id)->delete();
        foreach ($request->menus as $menuId) {
            $value = Submenu::where('uuid', $menuId)->select("uuid as submenu_uuid", "menu_uuid", 'groups_uuid')->first()->toArray();
            $value['position_id'] = $id;
            PositionHasMenu::create($value);
        }

        return redirect()->route('bungadavi.groups.index')->with('info', 'Position Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize("delete user group");
        return $position = Position::findOrFail($id)->delete();
    }

}
