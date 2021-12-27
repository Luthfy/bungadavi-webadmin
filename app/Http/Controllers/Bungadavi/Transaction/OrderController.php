<?php

namespace App\Http\Controllers\Bungadavi\Transaction;

use App\DataTables\Order\OrderDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $datatables)
    {
        $data = [
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
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
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
        ];

        return view('bungadavi.orders.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
