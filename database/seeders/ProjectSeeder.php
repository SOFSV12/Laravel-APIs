<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                "name"         => "Walgreens",
                "description"  => "supermarkert and pharamacy",
                "status"       => true,
                "start_date"   => now(),
                "end_date"     => now()->addDays(10)->format('Y-m-d'),
                "created_at"   => now(),
                "updated_at"   => now()
            ],
            [
                "name"         => "CVS",
                "description"  => "supermarkert and pharamacy",
                "status"       => false,
                "start_date"   => now(),
                "end_date"     => now()->addDays(10)->format('Y-m-d'),
                "created_at"   => now(),
                "updated_at"   => now()
            ],
            [
                "name"         => "Walmart",
                "description"  => "supermarkert and pharamacy",
                "status"       => true,
                "start_date"   => now(),
                "end_date"     => now()->addDays(10)->format('Y-m-d'),
                "created_at"   => now(),
                "updated_at"   => now()
            ],
            [
                "name"         => "Kools",
                "description"  => "Apparel and accessories",
                "status"       => false,
                "start_date"   => now(),
                "end_date"     => now()->addDays(10)->format('Y-m-d'),
                "created_at"   => now(),
                "updated_at"   => now()
            ],
            [
                "name"         => "Dick's Sporting Goods",
                "description"  => "sport equipment",
                "status"       => true,
                "start_date"   => now(),
                "end_date"     => now()->addDays(10)->format('Y-m-d'),
                "created_at"   => now(),
                "updated_at"   => now()
            ]
            ];

            Project::insert($projects);
    }
}
