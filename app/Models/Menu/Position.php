<?php

namespace App\Models\Menu;

use Ramsey\Uuid\Uuid;
use App\Models\Menu\PositionHasMenu;
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

    public function menuAdded()
    {
        $i = 0;
        $data = [];

        $menu = PositionHasMenu::where('position_id', $this->id)->get()->groupBy('menu_uuid');

        if ($menu != null) {
            foreach($menu as $key => $val)
            {
                $data[$i]['menu'] = Menu::find($key)->toArray();
                foreach ($val->toArray() as $key => $submenu) {
                    $data[$i]['submenu'][$key] = Submenu::find($submenu['submenu_uuid'])->toArray();
                }
                $i++;
            }
        }


        return $data;

    }

}
