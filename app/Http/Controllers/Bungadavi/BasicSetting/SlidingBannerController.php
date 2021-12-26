<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\SlidingBannerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\SlidingBannerRequest;
use App\Models\BasicSetting\SlidingBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SlidingBannerController extends Controller
{
    public function __construct()
    {

    }

    public function index(SlidingBannerDataTable $datatables)
    {
        $data = [
            'title'         => 'Sliding Banner',
            'subtitle'      => 'Sliding Banner',
            'description'   => 'For Management sliding banner',
            'breadcrumb'    => ['Basic Setting', 'Sliding Banner'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.slidingbanner.create'],
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
            'title'         => 'Sliding Banner Management',
            'subtitle'      => 'Form Sliding Banner',
            'description'   => 'For Management Sliding Banner',
            'breadcrumb'    => ['Sliding Banner Management', 'Form Sliding Banner'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.slidingbanner', $data);
    }

    public function store(SlidingBannerRequest $request)
    {
        $format_time_from = Carbon::createFromTimeString($request->banner_start_time)->format('H:i:s');
        $format_time_to = Carbon::createFromTimeString($request->banner_end_time)->format('H:i:s');

        $datetime_from = $request->banner_start_date  . ' ' . $format_time_from;
        $datetime_to =$request->banner_end_date . ' ' . $format_time_to;


        if($request->hasFile('banner')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('banner')->getClientOriginalName());
            $filePath = $request->banner->storeAs('slidingbanner',$name,'public');
        }

        SlidingBanner::create([
            'banner' => $filePath != null ? $filePath : null,
            'type' => $request->type,
            'banner_start_date' => $datetime_from,
            'banner_end_date' => $datetime_to,
            'title' => $request->title,
            'title_en' => $request->title_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('bungadavi.slidingbanner.index')->with('info', 'Sliding Banner Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Sliding Banner Management',
            'subtitle'      => 'Form Sliding Banner',
            'description'   => 'For Management Sliding Banner',
            'breadcrumb'    => ['Sliding Banner Management', 'Form Sliding Banner'],
            'guard' => auth()->user()->group,
            'data'  => SlidingBanner::find($id),
        ];

        return view('bungadavi.basicsetting.slidingbanner', $data);
    }

    public function update(SlidingBannerRequest $request, $id)
    {
        $format_date_from = Carbon::createFromFormat('m/d/Y', $request->banner_start_date)->format('Y-m-d');
        $format_date_to = Carbon::createFromFormat('m/d/Y', $request->banner_end_date)->format('Y-m-d');
        $format_time_from = Carbon::createFromTimeString($request->banner_start_time)->format('H:i:s');
        $format_time_to = Carbon::createFromTimeString($request->banner_end_time)->format('H:i:s');

        $datetime_from = $format_date_from  . ' ' . $format_time_from;
        $datetime_to =$format_date_to . ' ' . $format_time_to;


        $slidingBanner = SlidingBanner::find($id);
        $slidingBanner->type = $request->type;
        $slidingBanner->banner_start_date = $datetime_from;
        $slidingBanner->banner_end_date = $datetime_to;
        $slidingBanner->title = $request->title;
        $slidingBanner->title_en = $request->title_en;
        $slidingBanner->description = $request->description;
        $slidingBanner->description_en = $request->description_en;
        $slidingBanner->is_active = $request->is_active;
        if($request->hasFile('banner')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('banner')->getClientOriginalName());
            $slidingBanner->banner = $request->banner->storeAs('slidingbanner',$name,'public');
        }
        $slidingBanner->save();

        return redirect()->route('bungadavi.slidingbanner.index')->with('info', 'Sliding Banner Has Been Updated');
    }

    public function destroy($id)
    {
        return SlidingBanner::find($id)->delete();
    }
}
