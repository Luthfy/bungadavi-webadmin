<?php

namespace App\Http\Controllers\Bungadavi\Location;

use App\DataTables\Location\ProvinceDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location\Province;
use App\Http\Requests\Location\ProvinceRequest;
use App\Models\Location\Country;

class ProvinceController extends Controller
{
    public function __construct()
    {

    }

    public function index(ProvinceDataTable $datatables)
    {
        $this->authorize("view province");
        $data = [
            'title'         => 'Province',
            'subtitle'      => 'Province',
            'description'   => 'For Management province',
            'breadcrumb'    => ['Location', 'Province'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.province.create'],
            'guard' => auth()->user()->group
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function create()
    {
        $this->authorize("create province");
        $data = [
            'title'         => 'Province Management',
            'subtitle'      => 'Form Province',
            'description'   => 'For Management Province',
            'breadcrumb'    => ['Province Management', 'Form Province'],
            'guard' => auth()->user()->group,
            'data'  => null,
            'country' => Country::pluck('name', 'id')
        ];

        return view('bungadavi.location.province', $data);
    }

    public function store(ProvinceRequest $request)
    {
        Province::create($request->only('country_id','name'));

        return redirect()->route('bungadavi.province.index')->with('info', 'Province Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit province");
        foreach(Country::all() as $country){
            $country_selected[$country->id] = $country->name;
        }

        $data = [
            'title'         => 'Province Management',
            'subtitle'      => 'Form Province',
            'description'   => 'For Management Province',
            'breadcrumb'    => ['Province Management', 'Form Province'],
            'guard' => auth()->user()->group,
            'data'  => Province::find($id),
            'country' => $country_selected
        ];

        return view('bungadavi.location.province', $data);
    }

    public function update(ProvinceRequest $request, $id)
    {
        $province = Province::find($id);
        $province->country_id = $request->country_id;
        $province->name = $request->name;
        $province->save();

        return redirect()->route('bungadavi.province.index')->with('info', 'Province Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete province");
        return Province::find($id)->delete();
    }

    public function getProvinces()
    {
        $provinceId = $_GET['country-id'];

        return response()
            ->json(
                Province::where('country_id', $provinceId)->get(),
                200);
    }
}
