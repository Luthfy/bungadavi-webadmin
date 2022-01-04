<?php

namespace App\Models\Menu;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "submenus";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'name_submenu',
        'icon_submenu',
        'link_submenu',
        'guard_submenu',
        'is_priority',
        'groups_uuid',
        'menu_uuid'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            return $model['uuid'] = Uuid::uuid4()->toString();
        });
    }


    /**
     * Get the group that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'groups_uuid', 'uuid');
    }

    /**
     * Get the group that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_uuid', 'uuid');
    }
}
