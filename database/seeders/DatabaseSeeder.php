<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coach;

class CoachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coach::create([
            'name' => 'John Doe',
            'profile_image' => 'john_doe.jpg'
        ]);

        // Ajoutez d'autres entrées si nécessaire
        Coach::create([
            'name' => 'Jane Smith',
            'profile_image' => 'jane_smith.jpg'
        ]);
    }
}
