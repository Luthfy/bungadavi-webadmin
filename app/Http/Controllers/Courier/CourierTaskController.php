<?php

namespace App\Http\Controllers\Courier;

use App\DataTables\Courier\CourierTaskDataTable;
use App\Http\Controllers\Controller;
use App\Models\Courier\CourierTask;
use App\Models\Transaction\Schedule;
use Illuminate\Http\Request;

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
