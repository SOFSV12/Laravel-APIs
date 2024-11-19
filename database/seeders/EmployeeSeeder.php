<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project1 = Project::find(1);
        $project2 = Project::find(2);                               
        $project3 = Project::find(3);
        $project4 = Project::find(4);
        $project5 = Project::find(5);

        $emp = [
            [
                "project_id"    => $project1->id,
                "name"          => "Charles Taiwo",
                "email"         => "taiwo@icloud.com",
                "position"      => "Manager",
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "project_id"    => $project2->id,
                "name"          => "Charles bukowski",
                "email"         => "bukowski@icloud.com",
                "position"      => "Writer",
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "project_id"    => $project3->id,
                "name"          => "james jebbia",
                "email"         => "jebbia@icloud.com",
                "position"      => "ceo",
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "project_id"    => $project4->id,
                "name"          => "Phil Knight",
                "email"         => "knight@nike.com",
                "position"      => "CEO",
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "project_id"    => $project5->id,
                "name"          => "Steve Jobs",
                "email"         => "steve@apple.com",
                "position"      => "CEO",
                "created_at"    => now(),
                "updated_at"    => now()
            ]
        ];

        Employee::insert($emp);
    }
}
