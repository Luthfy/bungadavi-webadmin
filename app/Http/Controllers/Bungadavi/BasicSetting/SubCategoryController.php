<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\SubCategoryRequest;
use App\Models\BasicSetting\Category;
use App\Models\BasicSetting\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {

    }

    public function index(SubCategoryDataTable $datatables)
    {
        $this->authorize("view sub category");
        $data = [
            'title'         => 'Sub Category',
            'subtitle'      => 'Sub Category',
            'description'   => 'For Management sub category',
            'breadcrumb'    => ['Basic Setting', 'Sub Category'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.subcategory.create'],
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
        $this->authorize("create sub category");
        foreach(Category::all() as $category){
            $category_selected[$category->id] = $category->name;
        }
        $data = [
            'title'         => 'Sub Category Management',
            'subtitle'      => 'Form Sub Category',
            'description'   => 'For Management Sub Category',
            'breadcrumb'    => ['Sub Category Management', 'Form Sub Category'],
            'guard' => auth()->user()->group,
            'data'  => null,
            'category' => $category_selected,
        ];

        return view('bungadavi.basicsetting.subcategory', $data);
    }

    public function store(SubCategoryRequest $request)
    {
        if($request->hasFile('photo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('photo')->getClientOriginalName());
            $filePath = $request->photo->storeAs('subcategory',$name,'public');
        }

        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'priority' => $request->priority,
            'photo' => $filePath != null ? $filePath : null,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('bungadavi.subcategory.index')->with('info', 'Sub Category Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit sub category");
        foreach(Category::all() as $category){
            $category_selected[$category->id] = $category->name;
        }
        $data = [
            'title'         => 'Sub Category Management',
            'subtitle'      => 'Form Sub Category',
            'description'   => 'For Management Sub Category',
            'breadcrumb'    => ['Sub Category Management', 'Form Sub Category'],
            'guard' => auth()->user()->group,
            'data'  => SubCategory::find($id),
            'category' => $category_selected,
        ];

        return view('bungadavi.basicsetting.subcategory', $data);
    }

    public function update(SubCategoryRequest $request, $id)
    {

        $subcategory = SubCategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->name_en = $request->name_en;
        $subcategory->priority = $request->priority;
        $subcategory->is_active = $request->is_active;
        if($request->hasFile('photo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('photo')->getClientOriginalName());
            $subcategory->photo = $request->photo->storeAs('subcategory',$name,'public');
        }
        $subcategory->save();

        return redirect()->route('bungadavi.subcategory.index')->with('info', 'Sub Category Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete sub category");
        return SubCategory::find($id)->delete();
    }

    public function getSubCategories(Request $request)
    {
        $categoriesId = $request->categoryId;
        $arrCategories = explode(",", $categoriesId);

        return response()
            ->json(
                SubCategory::whereIn('category_id', $arrCategories)->get(),
            200);
    }
}
