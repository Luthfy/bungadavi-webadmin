<?php

namespace App\Http\Controllers\Bungadavi\BasicSetting;

use App\DataTables\BasicSetting\OurBankDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSetting\OurBankRequest;
use App\Models\BasicSetting\OurBank;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OurBankController extends Controller
{
    public function __construct()
    {

    }

    public function index(OurBankDataTable $datatables)
    {
        $this->authorize("view our bank");
        $data = [
            'title'         => 'Our Bank',
            'subtitle'      => 'Our Bank',
            'description'   => 'For Management our bank',
            'breadcrumb'    => ['Basic Setting', 'Our Bank'],
            'button'        => ['name' => 'Add New', 'link' => 'bungadavi.ourbank.create'],
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
        $this->authorize("create our bank");
        $data = [
            'title'         => 'Our Bank Management',
            'subtitle'      => 'Form Our Bank',
            'description'   => 'For Management Our Bank',
            'breadcrumb'    => ['Our Bank Management', 'Form Our Bank'],
            'guard' => auth()->user()->group,
            'data'  => null,
        ];

        return view('bungadavi.basicsetting.ourbank', $data);
    }

    public function store(OurBankRequest $request)
    {
        if($request->hasFile('bank_logo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('bank_logo')->getClientOriginalName());
            $filePath = $request->bank_logo->storeAs('ourbank',$name,'public');
        }

        OurBank::create([
            'type' => $request->type,
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_beneficiary_name' => $request->bank_beneficiary_name,
            'bank_code' => $request->bank_code,
            'bank_logo' => $filePath != null ? $filePath : null,
            'bank_branch' => $request->bank_branch,
        ]);

        return redirect()->route('bungadavi.ourbank.index')->with('info', 'Bank Has Been Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize("edit our bank");
        $data = [
            'title'         => 'Our Bank Management',
            'subtitle'      => 'Form Our Bank',
            'description'   => 'For Management Our Bank',
            'breadcrumb'    => ['Our Bank Management', 'Form Our Bank'],
            'guard' => auth()->user()->group,
            'data'  => OurBank::find($id),
        ];

        return view('bungadavi.basicsetting.ourbank', $data);
    }

    public function update(OurBankRequest $request, $id)
    {
        $ourbank = OurBank::find($id);
        $ourbank->type = $request->type;
        $ourbank->bank_name = $request->bank_name;
        $ourbank->bank_account_number = $request->bank_account_number;
        $ourbank->bank_beneficiary_name = $request->bank_beneficiary_name;
        $ourbank->bank_code = $request->bank_code;
        $ourbank->bank_branch = $request->bank_branch;
        if($request->hasFile('bank_logo')){
            $name = Str::random(4) . '_' . str_replace(' ','',$request->file('bank_logo')->getClientOriginalName());
            $ourbank->bank_logo = $request->bank_logo->storeAs('ourbank',$name,'public');
        }
        $ourbank->save();

        return redirect()->route('bungadavi.ourbank.index')->with('info', 'Bank Has Been Updated');
    }

    public function destroy($id)
    {
        $this->authorize("delete our bank");
        return OurBank::find($id)->delete();
    }
}
