<?php

namespace App\Models\Menu;

use Ramsey\Uuid\Uuid;
use App\Models\Menu\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "menus";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing    = false;

    protected $fillable = [
        'name_menu',
        'icon_menu',
        'submenu_menu',
        'link_menu',
        'guard_menu',
        'is_priority',
        'groups_uuid'
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
     * Get all of the submenu for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasSubmenu()
    {
        return $this->hasMany(Submenu::class, 'menu_uuid', 'uuid');
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
}
