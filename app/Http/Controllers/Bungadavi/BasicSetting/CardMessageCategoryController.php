<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\CardMessageCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\CardMessageCategoryRequest;
use App\Models\BasicSetting\CardMessageCategory;
use Illuminate\Http\Request;

class CardMessageCategoryController extends Controller
{

    public function index(CardMessageCategoryDataTable $datatables)
    {
        $data = [
            'title'         => 'Card Message Category',
            'subtitle'      => 'Card Message Category',
            'description'   => 'For Management card message category',
            'breadcrumb'    => ['Basic Setting', 'Card Message Category'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.cardmessagecategory.create'],
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
            'title'         => 'Card Message Category Management',
            'subtitle'      => 'Form Card Message Category',
            'description'   => 'For Management Card Message Category',
            'breadcrumb'    => ['Card Message Category Management', 'Form Card Message Category'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.cardmessagecategory', $data);
    }

    public function store(CardMessageCategoryRequest $request)
    {
        CardMessageCategory::create($request->only('name'));

        return redirect()->route('bungadavi.cardmessagecategory.index')->with('info', 'Card Message Category Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Card Message Category Management',
            'subtitle'      => 'Form Card Message Category',
            'description'   => 'For Management Card Message Category',
            'breadcrumb'    => ['Card Message Category Management', 'Form Card Message Category'],
            'guard' => auth()->user()->group,
            'data'  => CardMessageCategory::find($id),
        ];

        return view('bungadavi.basicsetting.cardmessagecategory', $data);
    }

    public function update(CardMessageCategoryRequest $request, $id)
    {
        $cmcategory = CardMessageCategory::find($id);
        $cmcategory->name = $request->name;
        $cmcategory->save();

        return redirect()->route('bungadavi.cardmessagecategory.index')->with('info', 'Card Message Category Has Been Updated');
    }

    public function destroy($id)
    {
        return CardMessageCategory::find($id)->delete();
    }

    public function list()
    {
        return response()->json(CardMessageCategory::all());
    }
}
