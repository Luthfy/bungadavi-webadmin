<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\DeliveryRemarkDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\DeliveryRemarkRequest;
use App\Models\BasicSetting\DeliveryRemark;
use Illuminate\Http\Request;

class DeliveryRemarkController extends Controller
{
    public function __construct()
    {

    }

    public function index(DeliveryRemarkDataTable $datatables)
    {
        $data = [
            'title'         => 'Delivery Remark',
            'subtitle'      => 'Delivery Remark',
            'description'   => 'For Management delivery remark',
            'breadcrumb'    => ['Basic Setting', 'Delivery Remark'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.deliveryremark.create'],
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
            'title'         => 'Delivery Remark Management',
            'subtitle'      => 'Form Delivery Remark',
            'description'   => 'For Management Delivery Remark',
            'breadcrumb'    => ['Delivery Remark Management', 'Form Delivery Remark'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.deliveryremark', $data);
    }

    public function store(DeliveryRemarkRequest $request)
    {
        DeliveryRemark::create($request->only('description','description_en','is_active'));

        return redirect()->route('bungadavi.deliveryremark.index')->with('info', 'Delivery Remark Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Delivery Remark Management',
            'subtitle'      => 'Form Delivery Remark',
            'description'   => 'For Management Delivery Remark',
            'breadcrumb'    => ['Delivery Remark Management', 'Form Delivery Remark'],
            'guard' => auth()->user()->group,
            'data'  => DeliveryRemark::find($id),
        ];

        return view('bungadavi.basicsetting.deliveryremark', $data);
    }

    public function update(DeliveryRemarkRequest $request, $id)
    {
        $currency = DeliveryRemark::find($id);
        $currency->description = $request->description;
        $currency->description_en = $request->description_en;
        $currency->is_active = $request->is_active;
        $currency->save();

        return redirect()->route('bungadavi.deliveryremark.index')->with('info', 'Delivery Remark Has Been Updated');
    }

    public function destroy($id)
    {
        return DeliveryRemark::find($id)->delete();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return DeliveryRemark::all();
        }
    }
}
