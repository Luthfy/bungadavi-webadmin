<?php

namespace App\Http\Controllers\Log;

use App\DataTables\Logs\ActivityLogDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(ActivityLogDataTable $datatables)
    {
        $data = [
            'title'         => 'Activity Log',
            'subtitle'      => 'Activity Log List',
            'description'   => 'For Activity Log List User',
            'breadcrumb'    => ['Basic Setting', 'Log', 'Activity'],
            'button'        => ['name' => '', 'link' => null],
        ];

        return $datatables->render('commons.datatable', $data);
    }
}
