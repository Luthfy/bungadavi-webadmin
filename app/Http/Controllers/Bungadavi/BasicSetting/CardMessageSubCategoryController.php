<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\CardMessageSubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\CardMessageSubCategoryRequest;
use App\Models\BasicSetting\CardMessageCategory;
use App\Models\BasicSetting\CardMessageSubCategory;
use Illuminate\Http\Request;

class CardMessageSubCategoryController extends Controller
{

    public function index(CardMessageSubCategoryDataTable $datatables)
    {
        $this->authorize("view card message subcategory");
        $data = [
            'title'         => 'Card Message Sub Category',
            'subtitle'      => 'Card Message Sub Category',
            'description'   => 'For Management card message sub category',
            'breadcrumb'    => ['Basic Setting', 'Card Message Sub Category'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.cardmessagesubcategory.create'],
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
        $this->authorize("create card message subcategory");
        foreach(CardMessageCategory::all() as $cmcategory){
            $cmcategory_selected[$cmcategory->id] = $cmcategory->name;
        }

        $data = [
            'title'         => 'Card Message Sub Category Management',
            'subtitle'      => 'Form Card Message Sub Category',
            'description'   => 'For Management Card Message Sub Category',
            'breadcrumb'    => ['Card Message Sub Category Management', 'Form Card Message Sub Category'],
            'guard' => auth()->user()->group,
            'data'  => null,
            'cmcategory' => $cmcategory_selected,
        ];

        return view('bungadavi.basicsetting.cardmessagesubcategory', $data);
    }

    public function store(CardMessageSubCategoryRequest $request)
    {
        CardMessageSubCategory::create($request->only('card_message_category_id','name','description'));

        return redirect()->route('bungadavi.cardmessagesubcategory.index')->with('info', 'Card Message Sub Category Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit card message subcategory");
        foreach(CardMessageCategory::all() as $cmcategory){
            $cmcategory_selected[$cmcategory->id] = $cmcategory->name;
        }
        $data = [
            'title'         => 'Card Message Sub Category Management',
            'subtitle'      => 'Form Card Message Sub Category',
            'description'   => 'For Management Card Message Sub Category',
            'breadcrumb'    => ['Card Message Sub Category Management', 'Form Card Message Sub Category'],
            'guard' => auth()->user()->group,
            'data'  => CardMessageSubCategory::find($id),
            'cmcategory' => $cmcategory_selected,
        ];

        return view('bungadavi.basicsetting.cardmessagesubcategory', $data);
    }

    public function update(CardMessageSubCategoryRequest $request, $id)
    {
        $cmsubcategory = CardMessageSubCategory::find($id);
        $cmsubcategory->card_message_category_id = $request->card_message_category_id;
        $cmsubcategory->name = $request->name;
        $cmsubcategory->description = $request->description;
        $cmsubcategory->save();

        return redirect()->route('bungadavi.cardmessagesubcategory.index')->with('info', 'Card Message Sub Category Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete card message subcategory");
        return CardMessageSubCategory::find($id)->delete();
    }

    public function list($id)
    {
        return response()->json(CardMessageSubCategory::where('card_message_category_id', $id)->get());
    }
}
