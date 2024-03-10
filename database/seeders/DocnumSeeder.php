<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docnum;

class DocnumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define docnum data
        $docnums = [
            [
                'DocType' => 'Category',
                'Prefix' => 'C',
                'Length' => 6,
                'CurrNum' => 1
            ],
            [
                'DocType' => 'Products',
                'Prefix' => 'P',
                'Length' => 6,
                'CurrNum' => 1
            ],
            [
                'DocType' => 'Sales',
                'Prefix' => 'S',
                'Length' => 6,
                'CurrNum' => 1
            ],
            [
                'DocType' => 'Sales-Details',
                'Prefix' => 'SD',
                'Length' => 7,
                'CurrNum' => 1
            ],
            // Add more docnum records as needed
        ];

        // Seed docnum data into the database
        foreach ($docnums as $docnum) {
            Docnum::create($docnum);
        }
    }
}
