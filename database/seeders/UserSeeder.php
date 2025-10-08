<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 1, 'fk_company' => '1', 'name' => 'کاربر', 'subscriptionid' => '3355117', 'lastname' => 'تست', 'birthday' => '2020-01-01', 'phone' => '02122802378', 'notificationtoken' => 'eYQAH5XyTmefI9eilprSOH:APA91bFRyvb5Mh3CYLZ_AADZWr_NFJv6IBa2dRAEY1Q_xU7F13GAQg68PjBWAzm3J9Iy7izPQJlwVGeobioHTmBjySPvVhSn354Ccp0eK64jVDCEd3YP_90', 'mobile' => '09121234567', 'email' => 'test@domain.com', 'password' => bcrypt(123456789), 'nationalcode' => '1234567890', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
