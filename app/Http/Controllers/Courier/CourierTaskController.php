<?php

namespace App\Http\Controllers\Courier;

use App\DataTables\Courier\CourierTaskDataTable;
use App\Http\Controllers\Controller;
use App\Models\BasicSetting\TimeSlot;
use App\Models\Courier\CourierTask;
use App\Models\Location\Province;
use App\Models\Transaction\Product;
use App\Models\Transaction\Schedule;
use Illuminate\Http\Request;
use App\Models\Product\Product as ProductStock;
use App\Models\Transaction\Order;
use App\Models\Transaction\SenderReceiver;

class CourierTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourierTaskDataTable $datatables)
    {
        $data = [
            'title'         => 'Courier Task Management',
            'subtitle'      => 'Courier Task List',
            'description'   => 'For Management Courier',
            'breadcrumb'    => ['Courier Task Management', 'Courier Task List'],
            'button'        => ['name' => 'Add Courier', 'link' => 'bungadavi.couriertask.create'],
        ];

        return $datatables->render('bungadavi.courier.courier_task.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = CourierTask::where('delivery_schedule_uuid',$id)->first();
        $get_product = Product::where('order_transactions_uuid', $data->order_transactions_uuid)->first();
        $data_product = ProductStock::findOrFail($get_product->product_uuid);
        $get_orders = Order::where('uuid', $data->order_transactions_uuid)->first();
        $get_delivery_schedule_order = Schedule::findOrFail($id);
        $get_receiver = SenderReceiver::where('order_transactions_uuid', $data->order_transactions_uuid)->first();
        $get_province = Province::where('id',$get_receiver->receiver_province)->first();
        $get_time_slot = TimeSlot::where('id',$get_delivery_schedule_order->time_slot_id)->first();

        $data = [
            'title'         => 'Customer Florist Management',
            'subtitle'      => 'Form Customer Florist',
            'description'   => 'For Management Customer Florist User',
            'breadcrumb'    => ['Customer Florist Management', 'Form Customer Florist'],
            'guard'         => auth()->user()->group,
            'data'          => $data,
            'product'       => $get_product,
            'data_product'  => $data_product,
            'orders'        => $get_orders,
            'delivery_schedule'      => $get_delivery_schedule_order,
            'receiver'      => $get_receiver,
            'province'      => $get_province,
            'time_slot'      => $get_time_slot,
        ];

        return view('bungadavi.courier.courier_task.show', $data);
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

    public function assignToCourier(Request $request, $scheduleOrderId)
    {
        $scheduleOrder = Schedule::findOrFail($scheduleOrderId);

        $task = new CourierTask();
        $task->order_transactions_uuid  = $scheduleOrder->order_transactions_uuid;
        $task->delivery_schedule_uuid   = $scheduleOrder->uuid;
        $task->status_assignment        = $request->status;
        $task->notes_assigment          = $request->notes;
        $task->browse_image             = $request->browse_image ?? 1;
        $task->courier_uuid             = $request->courier_uuid;
        $task->user_uuid                = auth()->user()->uuid ?? null;
        $task->save();

        return response(['message' => 'ok']);
    }
}
