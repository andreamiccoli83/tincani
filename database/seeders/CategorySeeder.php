<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array con i social da inserire
        $categories = [
            'NEWS',
            'EVENTS',
            'EDOTORIALE',
        ];

        // Ciclo attraverso l'array e inserisco i dati nel database
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
