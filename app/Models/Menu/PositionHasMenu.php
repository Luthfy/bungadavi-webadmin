<?php

namespace App\Models\Menu;

use App\Models\Menu\Menu;
use App\Models\Menu\Submenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PositionHasMenu extends Model
{
    protected $table = 'position_has_menu';

    protected $fillable = [
        'position_id',
        'groups_uuid',
        'menu_uuid',
        'submenu_uuid',
    ];

    /**
     * Get all of the menu for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasMenu()
    {
        return $this->hasMany(Menu::class, 'uuid', 'menu_uuid');
    }

    /**
     * Get all of the submenu for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasSubmenu()
    {
        return $this->hasMany(Submenu::class, 'uuid', 'submenu_uuid');
    }
}
