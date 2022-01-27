<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'view order']);

        Permission::create(['name' => 'create country']);
        Permission::create(['name' => 'view country']);
        Permission::create(['name' => 'edit country']);
        Permission::create(['name' => 'delete country']);

        Permission::create(['name' => 'create province']);
        Permission::create(['name' => 'view province']);
        Permission::create(['name' => 'edit province']);
        Permission::create(['name' => 'delete province']);

        Permission::create(['name' => 'create city']);
        Permission::create(['name' => 'view city']);
        Permission::create(['name' => 'edit city']);
        Permission::create(['name' => 'delete city']);

        Permission::create(['name' => 'create district']);
        Permission::create(['name' => 'view district']);
        Permission::create(['name' => 'edit district']);
        Permission::create(['name' => 'delete district']);

        Permission::create(['name' => 'create village']);
        Permission::create(['name' => 'view village']);
        Permission::create(['name' => 'edit village']);
        Permission::create(['name' => 'delete village']);

        Permission::create(['name' => 'create zipcode']);
        Permission::create(['name' => 'view zipcode']);
        Permission::create(['name' => 'edit zipcode']);
        Permission::create(['name' => 'delete zipcode']);

        Permission::create(['name' => 'create personal']);
        Permission::create(['name' => 'view personal']);
        Permission::create(['name' => 'edit personal']);
        Permission::create(['name' => 'delete personal']);

        Permission::create(['name' => 'create personal recipient']);
        Permission::create(['name' => 'view personal recipient']);
        Permission::create(['name' => 'edit personal recipient']);
        Permission::create(['name' => 'delete personal recipient']);

        Permission::create(['name' => 'create florist']);
        Permission::create(['name' => 'view florist']);
        Permission::create(['name' => 'edit florist']);
        Permission::create(['name' => 'delete florist']);

        Permission::create(['name' => 'create florist recipient']);
        Permission::create(['name' => 'view florist recipient']);
        Permission::create(['name' => 'edit florist recipient']);
        Permission::create(['name' => 'delete florist recipient']);

        Permission::create(['name' => 'create florist admin']);
        Permission::create(['name' => 'view florist admin']);
        Permission::create(['name' => 'edit florist admin']);
        Permission::create(['name' => 'delete florist admin']);

        Permission::create(['name' => 'create unit']);
        Permission::create(['name' => 'view unit']);
        Permission::create(['name' => 'edit unit']);
        Permission::create(['name' => 'delete unit']);

        Permission::create(['name' => 'create color']);
        Permission::create(['name' => 'view color']);
        Permission::create(['name' => 'edit color']);
        Permission::create(['name' => 'delete color']);

        Permission::create(['name' => 'create sliding banner']);
        Permission::create(['name' => 'view sliding banner']);
        Permission::create(['name' => 'edit sliding banner']);
        Permission::create(['name' => 'delete sliding banner']);

        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'view category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);

        Permission::create(['name' => 'create sub category']);
        Permission::create(['name' => 'view sub category']);
        Permission::create(['name' => 'edit sub category']);
        Permission::create(['name' => 'delete sub category']);

        Permission::create(['name' => 'create currency']);
        Permission::create(['name' => 'view currency']);
        Permission::create(['name' => 'edit currency']);
        Permission::create(['name' => 'delete currency']);

        Permission::create(['name' => 'create currency rate']);
        Permission::create(['name' => 'view currency rate']);
        Permission::create(['name' => 'edit currency rate']);
        Permission::create(['name' => 'delete currency rate']);

        Permission::create(['name' => 'create discount']);
        Permission::create(['name' => 'view discount']);
        Permission::create(['name' => 'edit discount']);
        Permission::create(['name' => 'delete discount']);

        Permission::create(['name' => 'create promotion']);
        Permission::create(['name' => 'view promotion']);
        Permission::create(['name' => 'edit promotion']);
        Permission::create(['name' => 'delete promotion']);

        Permission::create(['name' => 'create our bank']);
        Permission::create(['name' => 'view our bank']);
        Permission::create(['name' => 'edit our bank']);
        Permission::create(['name' => 'delete our bank']);

        Permission::create(['name' => 'create payment type']);
        Permission::create(['name' => 'view payment type']);
        Permission::create(['name' => 'edit payment type']);
        Permission::create(['name' => 'delete payment type']);

        Permission::create(['name' => 'create card message category']);
        Permission::create(['name' => 'view card message category']);
        Permission::create(['name' => 'edit card message category']);
        Permission::create(['name' => 'delete card message category']);

        Permission::create(['name' => 'create card message subcategory']);
        Permission::create(['name' => 'view card message subcategory']);
        Permission::create(['name' => 'edit card message subcategory']);
        Permission::create(['name' => 'delete card message subcategory']);

        Permission::create(['name' => 'create time slot']);
        Permission::create(['name' => 'view time slot']);
        Permission::create(['name' => 'edit time slot']);
        Permission::create(['name' => 'delete time slot']);

        Permission::create(['name' => 'create delivery remark']);
        Permission::create(['name' => 'view delivery remark']);
        Permission::create(['name' => 'edit delivery remark']);
        Permission::create(['name' => 'delete delivery remark']);

        Permission::create(['name' => 'create stock']);
        Permission::create(['name' => 'view stock']);
        Permission::create(['name' => 'edit stock']);
        Permission::create(['name' => 'delete stock']);

        Permission::create(['name' => 'create stock shop']);
        Permission::create(['name' => 'view stock shop']);
        Permission::create(['name' => 'edit stock shop']);
        Permission::create(['name' => 'delete stock shop']);

        Permission::create(['name' => 'create stock opname']);
        Permission::create(['name' => 'view stock opname']);
        Permission::create(['name' => 'edit stock opname']);
        Permission::create(['name' => 'delete stock opname']);

        Permission::create(['name' => 'create stock split']);
        Permission::create(['name' => 'view stock split']);
        Permission::create(['name' => 'edit stock split']);
        Permission::create(['name' => 'delete stock split']);

        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);

        Permission::create(['name' => 'view real time order']);

        Permission::create(['name' => 'view courier task']);

        Permission::create(['name' => 'create courier']);
        Permission::create(['name' => 'view courier']);
        Permission::create(['name' => 'edit courier']);
        Permission::create(['name' => 'delete courier']);

        Permission::create(['name' => 'create user group']);
        Permission::create(['name' => 'view user group']);
        Permission::create(['name' => 'edit user group']);
        Permission::create(['name' => 'delete user group']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'change price']);

        Permission::create(['name' => 'create corporate']);
        Permission::create(['name' => 'view corporate']);
        Permission::create(['name' => 'edit corporate']);
        Permission::create(['name' => 'delete corporate']);

        Permission::create(['name' => 'create corporate recipient']);
        Permission::create(['name' => 'view corporate recipient']);
        Permission::create(['name' => 'edit corporate recipient']);
        Permission::create(['name' => 'delete corporate recipient']);

        Permission::create(['name' => 'create corporate admin']);
        Permission::create(['name' => 'view corporate admin']);
        Permission::create(['name' => 'edit corporate admin']);
        Permission::create(['name' => 'delete corporate admin']);

    }
}
