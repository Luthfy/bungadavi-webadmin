<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\UnitDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\UnitRequest;
use App\Models\BasicSetting\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {

    }

    public function index(UnitDataTable $datatables)
    {
        $data = [
            'title'         => 'Unit',
            'subtitle'      => 'Unit',
            'description'   => 'For Management unit',
            'breadcrumb'    => ['Basic Setting', 'Unit'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.unit.create'],
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
            'title'         => 'Unit Management',
            'subtitle'      => 'Form Unit',
            'description'   => 'For Management Unit',
            'breadcrumb'    => ['Unit Management', 'Form Unit'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.unit', $data);
    }

    public function store(UnitRequest $request)
    {
        Unit::create($request->only('name'));

        return redirect()->route('bungadavi.unit.index')->with('info', 'Unit Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Unit Management',
            'subtitle'      => 'Form Unit',
            'description'   => 'For Management Unit',
            'breadcrumb'    => ['Unit Management', 'Form Unit'],
            'guard' => auth()->user()->group,
            'data'  => Unit::find($id),
        ];

        return view('bungadavi.basicsetting.unit', $data);
    }

    public function update(UnitRequest $request, $id)
    {
        $unit = Unit::find($id);
        $unit->name = $request->name;
        $unit->save();

        return redirect()->route('bungadavi.unit.index')->with('info', 'Unit Has Been Updated');
    }

    public function destroy($id)
    {
        return Unit::find($id)->delete();
    }
}
