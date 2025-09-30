<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array con i social da inserire
        $socials = [
            'Seleziona...',
            'Facebook',
            'Instagram',
            'Twitter',
            'Youtube',
            'Soundcloud',
        ];

        // Ciclo attraverso l'array e inserisco i dati nel database
        foreach ($socials as $social) {
            DB::table('socials')->insert([
                'social' => $social,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
