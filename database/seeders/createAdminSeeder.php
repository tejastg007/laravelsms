<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\companydetail;

class createAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // creates admin details like id, password, email and inserts the company details like address, phone number email
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'tejas',
            'email' => 'tejas@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $companydetails = companydetail::first();
        if ($companydetails == null) {
            companydetail::insert([
                'address' => 'near PWD office, behind karnataka bank, nippani road, chikodi, karnataka.',
                'phone1' => '7776999440',
                'email' => 'madcraft2019@gmail.com'
            ]);
        }
    }
}
