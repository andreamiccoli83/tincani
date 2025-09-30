<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $report = fopen(base_path("database/data/data.csv"), "r");

        if (!$report) {
            Log::error("Impossibile aprire il file CSV");
            return;
        }

        $insertedRecords = 0;

        fgetcsv($report, 10000, "|");


        while (($data = fgetcsv($report, 10000, "|")) !== FALSE) {
            try {
                // Verifica se l'array ha 18 elementi
                if (count($data) !== 12) {
                    Log::channel('custom_log')->error("L'array non ha 18 elementi, salto questa riga");
                    Log::channel('custom_log')->error($data);
                    continue; //Stop
                }

                // Estrai il link completo che inizia con "https://"
                preg_match('/https:\/\/[^"]+/', $data[8], $matches);
                $link = isset($matches[0]) ? $matches[0] : null;

                Post::create([
                    "id" => $data[0],
                    "title" => $data[2],
                    "body" => $data[6],
                    "short_body" => $data[7],
                    "published_at" => $data[3],
                    "enabled" => $data[9],
                    "category_id" => ($data[4] === 'NEWS') ? 1 : (($data[4] === 'EVENTS') ? 2 : 3),
                    "link" => $link,
                    "social_id" => ($data[5] == 'NULL' || $data[5] == '') ? 1 : $data[5],
                    "order_column" => $data[1],
                    "created_at" => $data[10],
                    "updated_at" => $data[11]
                ]);

                $insertedRecords++; 


            } catch (\Exception $e) {
                Log::channel('custom_log')->error($insertedRecords);
                Log::channel('custom_log')->error($data);
                Log::channel('custom_log')->error("Errore durante l'importazione della riga CSV: " . $e->getMessage());
                throw $e; // Termina il ciclo in caso di errore critico
            }
        }

        fclose($report);

        Log::channel('custom_log')->error("Importati con successo $insertedRecords record.");
    }
}
