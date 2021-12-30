<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\TimeSlotDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\TimeSlotRequest;
use App\Models\BasicSetting\TimeSlot;
use App\Models\Location\City;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeSlotController extends Controller
{

    public function index(TimeSlotDataTable $datatables)
    {
        $data = [
            'title'         => 'Time Slot',
            'subtitle'      => 'Time Slot',
            'description'   => 'For Management time slot',
            'breadcrumb'    => ['Basic Setting', 'Time Slot'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.timeslot.create'],
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
        foreach(City::all() as $city){
            $city_selected[$city->id] = $city->name;
        }

        $data = [
            'title'         => 'Time Slot Management',
            'subtitle'      => 'Form Time Slot',
            'description'   => 'For Management Time Slot',
            'breadcrumb'    => ['Time Slot Management', 'Form Time Slot'],
            'guard' => auth()->user()->group,
            'data'  => null,
            'city' => $city_selected,
        ];

        return view('bungadavi.basicsetting.timeslot', $data);
    }

    public function store(TimeSlotRequest $request)
    {
        $format_time_from = Carbon::createFromTimeString($request->time_from)->format('H:i:s');
        $datetime_from = $request->date_from  . ' ' . $format_time_from;

        if ($request->date_to != null) {
            $format_time_to = Carbon::createFromTimeString($request->time_to)->format('H:i:s');
            $datetime_to =$request->date_to . ' ' . $format_time_to;
        } else {
            $datetime_to = null;
        }


        TimeSlot::create([
            'time_slot_name' => $request->time_slot_name,
            'time_from' => $datetime_from ,
            'time_to' => $datetime_to,
            'price' => $request->price,
            'description' => $request->description,
            'city_available' => json_encode($request->city_available),
            'is_priority' => $request->is_priority,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('bungadavi.timeslot.index')->with('info', 'Time Slot Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        foreach(City::all() as $city){
            $city_selected[$city->id] = $city->name;
        }

        $data = [
            'title'         => 'Time Slot Management',
            'subtitle'      => 'Form Time Slot',
            'description'   => 'For Management Time Slot',
            'breadcrumb'    => ['Time Slot Management', 'Form Time Slot'],
            'guard' => auth()->user()->group,
            'data'  => TimeSlot::find($id),
            'city' => $city_selected,
        ];

        return view('bungadavi.basicsetting.timeslot', $data);
    }

    public function update(TimeSlotRequest $request, $id)
    {
        $format_date_from = Carbon::createFromFormat('m/d/Y', $request->date_from)->format('Y-m-d');
        $format_date_to = Carbon::createFromFormat('m/d/Y', $request->date_to)->format('Y-m-d');
        $format_time_from = Carbon::createFromTimeString($request->time_from)->format('H:i:s');
        $format_time_to = Carbon::createFromTimeString($request->time_to)->format('H:i:s');

        $datetime_from = $format_date_from  . ' ' . $format_time_from;
        $datetime_to =$format_date_to . ' ' . $format_time_to;

        $timeslot = TimeSlot::find($id);
        $timeslot->time_slot_name = $request->time_slot_name;
        $timeslot->time_from = $datetime_from;
        $timeslot->time_to = $datetime_to;
        $timeslot->price = $request->price;
        $timeslot->description = $request->description;
        $timeslot->city_available = json_encode($request->city_available);
        $timeslot->is_priority = $request->is_priority;
        $timeslot->is_active = $request->is_active;
        $timeslot->save();

        return redirect()->route('bungadavi.timeslot.index')->with('info', 'Time Slot Has Been Updated');
    }

    public function destroy($id)
    {
        return TimeSlot::find($id)->delete();
    }

    public function list($date)
    {
        $dateTime = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d') . " 00:00:00";

        $timeslot = TimeSlot::where('time_from', "<", $dateTime);

        if ($timeslot->where('is_priority', 1)) {
            $timeslot = TimeSlot::where('time_from', "<", $dateTime)->where('is_priority', 1)->get();
        } if ($timeslot->where('time_to', "!=", null)) {
            $timeslot = TimeSlot::where('time_from', "<", $dateTime)->where('time_to', ">", $dateTime)->get();
        }

        return response()->json($timeslot ?? []);
    }
}
