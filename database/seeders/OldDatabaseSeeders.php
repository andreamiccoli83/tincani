<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OldDatabaseSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            SocialSeeder::class,
            PostSeeder::class,
            MediaImporter::class
        ]);
    }
}
