<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\ColorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\ColorRequest;
use App\Models\BasicSetting\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct()
    {

    }

    public function index(ColorDataTable $datatables)
    {
        $this->authorize("view color");
        $data = [
            'title'         => 'Color',
            'subtitle'      => 'Color',
            'description'   => 'For Management color',
            'breadcrumb'    => ['Basic Setting', 'Color'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.color.create'],
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
        $this->authorize("create color");
        $data = [
            'title'         => 'Color Management',
            'subtitle'      => 'Form Color',
            'description'   => 'For Management Color',
            'breadcrumb'    => ['Color Management', 'Form Color'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.color', $data);
    }

    public function store(ColorRequest $request)
    {
        Color::create($request->only('name','hexa'));

        return redirect()->route('bungadavi.color.index')->with('info', 'Color Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit color");
        $data = [
            'title'         => 'Color Management',
            'subtitle'      => 'Form Color',
            'description'   => 'For Management Color',
            'breadcrumb'    => ['Color Management', 'Form Color'],
            'guard' => auth()->user()->group,
            'data'  => Color::find($id),
        ];

        return view('bungadavi.basicsetting.color', $data);
    }

    public function update(ColorRequest $request, $id)
    {
        $color = Color::find($id);
        $color->name = $request->name;
        $color->hexa = $request->hexa;
        $color->save();

        return redirect()->route('bungadavi.color.index')->with('info', 'Unit Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete color");
        return Color::find($id)->delete();
    }
}
