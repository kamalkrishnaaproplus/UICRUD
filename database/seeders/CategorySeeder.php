<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category; // Import the Category model

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'CategoryID' => 'C2024-000001',
                'CategoryName' => 'Foods',
                'Image' => 'image1.jpg',
                'ActiveStatus' => 'Active',
                'DFlag' => 0,
                'CreatedOn' => Carbon::now(),
                'UpdatedOn' => null,
                'DeletedOn' => null
            ],
            [
                'CategoryID' => 'C2024-000002',
                'CategoryName' => 'Apparels',
                'Image' => 'image1.jpg',
                'ActiveStatus' => 'Active',
                'DFlag' => 0,
                'CreatedOn' => Carbon::now(),
                'UpdatedOn' => null,
                'DeletedOn' => null
            ],
            [
                'CategoryID' => 'C2024-000003',
                'CategoryName' => 'Electronics',
                'Image' => 'image1.jpg',
                'ActiveStatus' => 'Active',
                'DFlag' => 0,
                'CreatedOn' => Carbon::now(),
                'UpdatedOn' => null,
                'DeletedOn' => null
            ],
           
        ];

        // Insert data into the table
        Category::insert($categories);
    }
}
