<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\DiscountDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\DiscountRequest;
use App\Models\BasicSetting\Discount;
use App\Models\BasicSetting\Promotion;
use Carbon\Carbon;

class DiscountController extends Controller
{
    public function __construct()
    {

    }

    public function index(DiscountDataTable $datatables)
    {
        $this->authorize("view discount");
        $data = [
            'title'         => 'Discount',
            'subtitle'      => 'Discount',
            'description'   => 'For Management discount',
            'breadcrumb'    => ['Basic Setting', 'Discount'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.discount.create'],
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
        $this->authorize("create discount");
        foreach(Promotion::all() as $promotion){
            $promotion_selected[$promotion->uuid] = $promotion->promotion_code;
        }

        $data = [
            'title'         => 'Discount Management',
            'subtitle'      => 'Form Discount',
            'description'   => 'For Management Discount',
            'breadcrumb'    => ['Discount Management', 'Form Discount'],
            'guard' => auth()->user()->group,
            'data'  => null,
            'promotion' => $promotion_selected,
        ];

        return view('bungadavi.basicsetting.discount', $data);
    }

    public function store(DiscountRequest $request)
    {
        $format_time_from = Carbon::createFromTimeString($request->voucher_start_time)->format('H:i:s');
        $format_time_to = Carbon::createFromTimeString($request->voucher_end_time)->format('H:i:s');

        $datetime_from = $request->voucher_start_date  . ' ' . $format_time_from;
        $datetime_to =$request->voucher_end_date . ' ' . $format_time_to;

        Discount::create([
            'promo_uuid' => $request->promo_uuid,
            'title' => $request->title,
            'title_en' => $request->title_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'voucher_code' => $request->voucher_code,
            'voucher_start_date' => $datetime_from,
            'voucher_end_date' => $datetime_to,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'discount_max' => $request->discount_max,
            'minbill' => $request->minbill,
            'action_by_guest' => $request->action_by_guest,
            'quota' => $request->quota,
            'payment_category' => $request->payment_category,
            'payment_type_id' => $request->payment_type_id,
            'is_active' => $request->is_active,
            'tnc' => $request->tnc,
            'tnc_en' => $request->tnc_en,
        ]);

        return redirect()->route('bungadavi.discount.index')->with('info', 'Discount Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit discount");
        foreach(Promotion::all() as $promotion){
            $promotion_selected[$promotion->uuid] = $promotion->promotion_code;
        }
        $data = [
            'title'         => 'Discount Management',
            'subtitle'      => 'Form Discount',
            'description'   => 'For Management Discount',
            'breadcrumb'    => ['Discount Management', 'Form Discount'],
            'guard' => auth()->user()->group,
            'data'  => Discount::find($id),
            'promotion' => $promotion_selected,
        ];

        return view('bungadavi.basicsetting.discount', $data);
    }

    public function update(DiscountRequest $request, $id)
    {
        $format_date_from = Carbon::createFromFormat('m/d/Y', $request->voucher_start_date)->format('Y-m-d');
        $format_date_to = Carbon::createFromFormat('m/d/Y', $request->voucher_end_date)->format('Y-m-d');
        $format_time_from = Carbon::createFromTimeString($request->voucher_start_time)->format('H:i:s');
        $format_time_to = Carbon::createFromTimeString($request->voucher_end_time)->format('H:i:s');

        $datetime_from = $format_date_from  . ' ' . $format_time_from;
        $datetime_to =$format_date_to . ' ' . $format_time_to;

        $Discount = Discount::find($id);
        $Discount->promo_uuid = $request->promo_uuid;
        $Discount->title = $request->title;
        $Discount->title_en = $request->title_en;
        $Discount->description = $request->description;
        $Discount->description_en = $request->description_en;
        $Discount->voucher_code = $request->voucher_code;
        $Discount->voucher_start_date = $datetime_from;
        $Discount->voucher_end_date = $datetime_to;
        $Discount->discount_type = $request->discount_type;
        $Discount->discount_value = $request->discount_value;
        $Discount->discount_max = $request->discount_max;
        $Discount->minbill = $request->minbill;
        $Discount->action_by_guest = $request->action_by_guest;
        $Discount->quota = $request->quota;
        $Discount->payment_category = $request->payment_category;
        $Discount->payment_type_id = $request->payment_type_id;
        $Discount->is_active = $request->is_active;
        $Discount->tnc = $request->tnc;
        $Discount->tnc_en = $request->tnc_en;
        $Discount->save();

        return redirect()->route('bungadavi.discount.index')->with('info', 'Discount Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete discount");
        return Discount::find($id)->delete();
    }
}
