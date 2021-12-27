<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\PaymentTypeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\PaymentTypeRequest;
use App\Models\BasicSetting\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function __construct()
    {

    }

    public function index(PaymentTypeDataTable $datatables)
    {
        $data = [
            'title'         => 'Payment Type',
            'subtitle'      => 'Payment Type',
            'description'   => 'For Management payment type',
            'breadcrumb'    => ['Basic Setting', 'Payment Type'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.paymenttype.create'],
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
            'title'         => 'Payment Type Management',
            'subtitle'      => 'Form Payment Type',
            'description'   => 'For Management Payment Type',
            'breadcrumb'    => ['Payment Type Management', 'Form Payment Type'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.paymenttype', $data);
    }

    public function store(PaymentTypeRequest $request)
    {
        PaymentType::create($request->only('payment_type'));

        return redirect()->route('bungadavi.paymenttype.index')->with('info', 'Payment Type Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Payment Type Management',
            'subtitle'      => 'Form Payment Type',
            'description'   => 'For Management Payment Type',
            'breadcrumb'    => ['Payment Type Management', 'Form Payment Type'],
            'guard' => auth()->user()->group,
            'data'  => PaymentType::find($id),
        ];

        return view('bungadavi.basicsetting.paymenttype', $data);
    }

    public function update(PaymentTypeRequest $request, $id)
    {
        $paymenttype = PaymentType::find($id);
        $paymenttype->payment_type = $request->payment_type;
        $paymenttype->save();

        return redirect()->route('bungadavi.paymenttype.index')->with('info', 'Payment Type Has Been Updated');
    }

    public function destroy($id)
    {
        return PaymentType::find($id)->delete();
    }
}
