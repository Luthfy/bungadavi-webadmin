<?php

namespace App\Models\Menu;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the menus for the Position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasRoleMenu()
    {
        return $this->hasMany(PositionHasMenu::class, 'position_id', 'id');
    }

}
