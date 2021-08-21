<?php

namespace Database\Seeders;

use App\Models\Locale;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $locales = Locale::all();

        foreach ($users as $user) {
           
                Profile::create([
                    'user_id' => $user->id,
                    'locale_id' => 2,
                ]);
        }
    }
}
