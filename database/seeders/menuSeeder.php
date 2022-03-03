<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Dashboard',
                'route' => '/',
                'icon' => 'fas fa-tachometer-alt',
                'position' => 0,
                'parent_name' => 'root',
                'parent_id' => 0
            ],
            [
                'name' => 'Static Pages',
                'route' => '#',
                'icon' => 'fas fa-copy',
                'position' => 1,
                'parent_name' => 'root',
                'parent_id' => 0
            ],
            [
                'name' => 'FAQ',
                'route' => '/faq',
                'icon' => 'fas fa-question',
                'position' => 2,
                'parent_name' => 'root',
                'parent_id' => 0
            ],
            [
                'name' => 'Home',
                'route' => '/staticpage/home',
                'icon' => 'fa fa-file',
                'position' => 0,
                'parent_name' => 'Static Pages',
                'parent_id' => 2
            ],
            [
                'name' => 'About',
                'route' => '/staticpage/about',
                'icon' => 'fa fa-file',
                'position' => 0,
                'parent_name' => 'Static Pages',
                'parent_id' => 2
            ],
            [
                'name' => 'County locator by zip code',
                'route' => '/staticpage/county-locator-by-zip-code',
                'icon' => 'fa fa-file',
                'position' => 0,
                'parent_name' => 'Static Pages',
                'parent_id' => 2
            ],
            [
                'name' => 'County Records',
                'route' => '/staticpage/county-records',
                'icon' => 'fa fa-file',
                'position' => 0,
                'parent_name' => 'Static Pages',
                'parent_id' => 2
            ],
            [
                'name' => 'City to County Lookup',
                'route' => '/staticpage/city-t-county-lookup',
                'icon' => 'fa fa-file',
                'position' => 0,
                'parent_name' => 'Static Pages',
                'parent_id' => 2
            ],
            [
                'name' => 'Contact Now',
                'route' => '/staticpage/contact-now',
                'icon' => 'fa fa-file',
                'position' => 0,
                'parent_name' => 'Static Pages',
                'parent_id' => 2
            ],

        ];

        Menu::insert($menus);
    }
}
