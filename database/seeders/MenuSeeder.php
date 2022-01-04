<?php

namespace Database\Seeders;

use App\Models\Menu\Group;
use App\Models\Menu\Menu;
use App\Models\Menu\Submenu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $groups = [
            [
                'name_group'    => 'bungadavi',
                'is_priority'   => '1',
                'menu'  => [
                    [
                        'name_menu'     => 'User Team',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'admin/',
                        'is_priority'   => '1',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'User Group',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'admin/',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'User Detail',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'admin/',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '2',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'User Log',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'admin/',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '3',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ]
                        ]
                    ],
                    [
                        'name_menu'     => 'Location',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '2',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'Country',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/location/country',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Province',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/location/province',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '2',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'City',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/location/city',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '3',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'District',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/location/district',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '4',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Village',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/location/village',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '5',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Zip Code',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/location/zipcode',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '6',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ]
                        ]
                    ],
                    [
                        'name_menu'     => 'Client',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '3',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'Personal',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/personal',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Personal Recipient',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/personalrecipient',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '2',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Corporate',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/dashboard',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '3',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Florist',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/florist',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '4',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Florist Recipient',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/floristrecipient',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '5',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Florist Admin',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/floristadmin',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '6',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ]
                        ]
                    ],
                    [
                        'name_menu'     => 'Basic Setting',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '4',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'Setting',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/dashboard',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Unit',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/unit',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '2',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Color',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/color',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '3',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Sliding Banner',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/slidingbanner',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '4',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Category',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/category',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '5',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Sub Category',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/subcategory',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '6',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Currency',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/currency',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '7',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Currency Rate',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/currencyrate',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '8',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Discount',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/discount',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '9',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Promotion',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/promotion',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '10',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Occasian Special Price',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/dashboard',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '11',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Our Bank',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/ourbank',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '12',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Payment Type',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/paymenttype',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '13',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Midtrans Setting',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/dashboard',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '14',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Card Message Category',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/cardmessagecategory',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '15',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Card Message Sub Category',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/cardmessagesubcategory',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '16',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Time Slot',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/timeslot',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '17',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Delivery Remark',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/basicsetting/deliveryremark',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '18',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Message Group',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/dashboard',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '19',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Icon Social Media',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/dashboard',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '20',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Testimonial',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/dashboard',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '21',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                        ]
                    ],
                    [
                        'name_menu'     => 'Stock Control',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '5',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'Stock',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/stocks',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Stock Shop',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/shops',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '2',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Stock Opname',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/opnames',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '3',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Stock Split',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/splits',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '4',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ]
                        ]
                    ],
                    [
                        'name_menu'     => 'Product Control',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '6',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'Product',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/products',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ]
                        ]
                    ],
                    [
                        'name_menu'     => 'Order',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '7',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'Create Order',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/transaction/create',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Order List',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/transaction',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '2',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ]
                        ]
                    ],
                    [
                        'name_menu'     => 'Real Time Order',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '8',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '0',
                    ],
                    [
                        'name_menu'     => 'Courier Task',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '9',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '0',
                    ],
                    [
                        'name_menu'     => 'Courier',
                        'icon_menu'     => '',
                        'guard_menu'    => 'bungadavi',
                        'link_menu'     => 'bungadavi/dashboard',
                        'is_priority'   => '10',
                        'groups_uuid'   => null,
                        'submenu_menu'  => '1',
                        'submenu' => [
                            [
                                'name_submenu'  => 'Create Courier',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/courier',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '1',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ],
                            [
                                'name_submenu'  => 'Courier List',
                                'icon_submenu'  => '',
                                'link_submenu'  => 'bungadavi/courier',
                                'guard_submenu' => 'bungadavi',
                                'is_priority'   => '2',
                                'groups_uuid'   => null,
                                'menu_uuid'     => null,
                            ]
                        ]
                    ],
                ]
            ]
        ];

        foreach ($groups as $key => $group) {

            $menu = $group['menu'] ?? null;

            unset($group['menu']);
            $groupId = Group::create($group)->uuid;

            if ($menu != null) {
                foreach ($menu as $m) {
                    $submenu = $m['submenu'] ?? null;

                    unset($m['submenu']);
                    $m['groups_uuid'] = $groupId;
                    $menuId = Menu::create($m)->uuid;

                    if ($submenu != null) {
                        foreach ($submenu as $sm) {
                            $sm['groups_uuid']  = $groupId;
                            $sm['menu_uuid']    = $menuId;
                            Submenu::Create($sm);
                        }
                    }
                }
            }
        }
    }
}
