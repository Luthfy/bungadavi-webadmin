<?php

namespace App\Models\Log;

use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Activity
{

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];
}
