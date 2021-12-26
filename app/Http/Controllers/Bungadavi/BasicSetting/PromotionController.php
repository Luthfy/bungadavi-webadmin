<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\PromotionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\PromotionRequest;
use App\Models\BasicSetting\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function __construct()
    {

    }

    public function index(PromotionDataTable $datatables)
    {
        $data = [
            'title'         => 'Promotion',
            'subtitle'      => 'Promotion',
            'description'   => 'For Management promotion',
            'breadcrumb'    => ['Basic Setting', 'Promotion'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.promotion.create'],
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
            'title'         => 'Promotion Management',
            'subtitle'      => 'Form Promotion',
            'description'   => 'For Management Promotion',
            'breadcrumb'    => ['Promotion Management', 'Form Promotion'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.promotion', $data);
    }

    public function store(PromotionRequest $request)
    {
        $format_time_from = Carbon::createFromTimeString($request->promo_start_time)->format('H:i:s');
        $format_time_to = Carbon::createFromTimeString($request->promo_end_time)->format('H:i:s');

        $datetime_from = $request->promo_start_date  . ' ' . $format_time_from;
        $datetime_to =$request->promo_end_date . ' ' . $format_time_to;


        if($request->hasFile('image')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('image')->getClientOriginalName());
            $filePath = $request->image->storeAs('promotion',$name,'public');
        }

        Promotion::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'image' => $filePath != null ? $filePath : null,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'tnc' => $request->tnc,
            'tnc_en' => $request->tnc_en,
            'promotion_code' => $request->promotion_code,
            'is_active' => $request->is_active,
            'promo_start_date' => $datetime_from,
            'promo_end_date' => $datetime_to,

        ]);

        return redirect()->route('bungadavi.promotion.index')->with('info', 'Promotion Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Promotion Management',
            'subtitle'      => 'Form Promotion',
            'description'   => 'For Management Promotion',
            'breadcrumb'    => ['Promotion Management', 'Form Promotion'],
            'guard' => auth()->user()->group,
            'data'  => Promotion::find($id),
        ];

        return view('bungadavi.basicsetting.promotion', $data);
    }

    public function update(PromotionRequest $request, $id)
    {
        $format_date_from = Carbon::createFromFormat('m/d/Y', $request->promo_start_date)->format('Y-m-d');
        $format_date_to = Carbon::createFromFormat('m/d/Y', $request->promo_end_date)->format('Y-m-d');
        $format_time_from = Carbon::createFromTimeString($request->promo_start_time)->format('H:i:s');
        $format_time_to = Carbon::createFromTimeString($request->promo_end_time)->format('H:i:s');

        $datetime_from = $format_date_from  . ' ' . $format_time_from;
        $datetime_to =$format_date_to . ' ' . $format_time_to;

        $promotion = Promotion::find($id);
        $promotion->title = $request->title;
        $promotion->title_en = $request->title_en;
        $promotion->description = $request->description;
        $promotion->description_en = $request->description_en;
        $promotion->tnc = $request->tnc;
        $promotion->tnc_en = $request->tnc_en;
        $promotion->promotion_code = $request->promotion_code;
        $promotion->is_active = $request->is_active;
        $promotion->promo_start_date = $datetime_from;
        $promotion->promo_end_date = $datetime_to;

        if($request->hasFile('image')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('image')->getClientOriginalName());
            $promotion->image = $request->image->storeAs('promotion',$name,'public');
        }
        $promotion->save();

        return redirect()->route('bungadavi.promotion.index')->with('info', 'Promotion Has Been Updated');
    }

    public function destroy($id)
    {
        return Promotion::find($id)->delete();
    }
}
