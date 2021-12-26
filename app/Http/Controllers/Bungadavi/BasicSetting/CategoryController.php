<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\CategoryRequest;
use App\Models\BasicSetting\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function index(CategoryDataTable $datatables)
    {
        $data = [
            'title'         => 'Category',
            'subtitle'      => 'Category',
            'description'   => 'For Management category',
            'breadcrumb'    => ['Basic Setting', 'Category'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.category.create'],
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
            'title'         => 'Category Management',
            'subtitle'      => 'Form Category',
            'description'   => 'For Management Category',
            'breadcrumb'    => ['Category Management', 'Form Category'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.category', $data);
    }

    public function store(CategoryRequest $request)
    {
        if($request->hasFile('photo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('photo')->getClientOriginalName());
            $filePath = $request->photo->storeAs('category',$name,'public');
        }

        Category::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'priority' => $request->priority,
            'photo' => $filePath != null ? $filePath : null,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('bungadavi.category.index')->with('info', 'Category Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Category Management',
            'subtitle'      => 'Form Category',
            'description'   => 'For Management Category',
            'breadcrumb'    => ['Category Management', 'Form Category'],
            'guard' => auth()->user()->group,
            'data'  => Category::find($id),
        ];

        return view('bungadavi.basicsetting.category', $data);
    }

    public function update(CategoryRequest $request, $id)
    {

        $category = Category::find($id);
        $category->name = $request->name;
        $category->name_en = $request->name_en;
        $category->priority = $request->priority;
        $category->is_active = $request->is_active;
        if($request->hasFile('photo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('photo')->getClientOriginalName());
            $category->photo = $request->photo->storeAs('category',$name,'public');
        }
        $category->save();

        return redirect()->route('bungadavi.category.index')->with('info', 'Category Has Been Updated');
    }

    public function destroy($id)
    {
        return Category::find($id)->delete();
    }

    public function getCategories()
    {
        return response()
            ->json(
                Category::all(),
            200);

    }
}
