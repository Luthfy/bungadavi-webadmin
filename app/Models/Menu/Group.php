<?php

namespace App\Models\Menu;

use Ramsey\Uuid\Uuid;
use App\Models\Menu\Menu;
use App\Models\Menu\Submenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{

    use HasFactory, SoftDeletes;

    protected $table        = "groups";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'name_group',
        'is_priority'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            return $model->uuid = Uuid::uuid4()->toString();
        });
    }

    /**
     * Get all of the menu for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasMenu()
    {
        return $this->hasMany(Menu::class, 'groups_uuid', 'uuid');
    }

    /**
     * Get all of the submenu for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasSubmenu()
    {
        return $this->hasMany(Submenu::class, 'groups_uuid', 'uuid');
    }
}
