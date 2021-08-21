<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
              'name' => "English",
              'slug' => 'en'
            ],
            [
              'name' => "German",  
              'slug' => 'de'
                
            ]           
        ];

        foreach ($languages as $locale) {
                Locale::create($locale);
        }
    }
}
