<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class MediaImporter extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $report = fopen(base_path("database/data/img.csv"), "r");
        fgetcsv($report, 10000, ";");

        $rowLimit = 500; // Numero massimo di righe da elaborare

        $currentRow = 0; // Contatore delle righe elaborate

        while (($data = fgetcsv($report, 10000, ";")) !== FALSE && $currentRow < $rowLimit) {
            $post = Post::find($data[1]);
            
            if ($post) { // Verifica se il record esiste
                if ($data[6] == 1) { // Verifica se 'is_cover' è 1
                    $post->addMedia(base_path('database/data/img/gallery/' . $data[1] . '/' . $data[2]))->toMediaCollection('cover');
                } else {
                    if ($data[5] == 'IMAGE') {
                        $path = base_path('database/data/img/gallery/' . $data[1] . '/' . $data[2]);
                        $post->addMedia($path)->withResponsiveImages()->toMediaCollection('gallery');
                    } elseif ($data[5] == 'FILE') {
                        $path = base_path('database/data/img/attachments/' . $data[1] . '/' . $data[2]);
                        $post->addMedia($path)->toMediaCollection('pdf');
                    }
                }
            }else{
                Log::channel('custom_log')->error("Questo post non esiste");
                Log::channel('custom_log')->error($post);
            }
            
            $currentRow++;
        }

        fclose($report);

    }
}
