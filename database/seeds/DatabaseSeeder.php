<?php

use Illuminate\Database\Seeder;

use App\Organisation;
use App\Branch;
use App\Staff;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganisationTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(StaffTableSeeder::class);
    }
}

class OrganisationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('organisation')->delete();
        $orgs = [
                    ['name' => 'Webtools'],
                    ['name' => 'Google'],
                    ['name' => 'Microsoft'],
                    ['name' => 'Facebook'],
                    ['name' => 'FinSS Global']
                ];
        foreach($orgs as $org){
            Organisation::create($org);
        }
    }
    
}

class BranchTableSeeder extends Seeder {

    public function run()
    {
        DB::table('branch')->delete();

        $testBranches = [
                            ['name' => 'Auckland', 'organisation_id' => 1],
                            ['name' => 'Docklands', 'organisation_id' => 5],
                            ['name' => 'North Shore', 'organisation_id' => 1],
                            ['name' => 'Sydney', 'organisation_id' => 1],
                            ['name' => 'London', 'organisation_id' => 2],
                            ['name' => 'Manukau', 'organisation_id' => 2],
                            ['name' => 'Wellington', 'organisation_id' => 3],
                            ['name' => 'Sydney', 'organisation_id' => 2],
                            ['name' => 'UAE', 'organisation_id' => 3],
                            ['name' => 'London', 'organisation_id' => 4],
                            ['name' => 'Arizona', 'organisation_id' => 3],
                            ['name' => 'New York', 'organisation_id' => 4],
                            ['name' => 'Forest Hill', 'organisation_id' => 5],
                            ['name' => 'Puna', 'organisation_id' => 3],
                            ['name' => 'Melbourne', 'organisation_id' => 1]
                        ];

        foreach($testBranches as $testBranche){
            Branch::create($testBranche);
        }
    }

}


class StaffTableSeeder extends Seeder {

    public function run()
    {
        DB::table('staff')->delete();

        for ($i=0; $i < 20; $i++) { 
	    	Staff::create([ 'name' => ucfirst(strtolower(Str::random(6))), 'branch_id' => rand(1, 15) ]);
        }
        

    }

}
