<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JsonCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Percorso del file CSV da cui leggere i dati
        $csvFilePath = base_path("database/data/posts.csv");

        // Verifica se il file CSV esiste
        if (!file_exists($csvFilePath)) {
            $this->command->error("Il file CSV non esiste: $csvFilePath");
            return;
        }

        // Apri il file CSV in modalità lettura
        $csvFile = fopen(base_path("database/data/posts.csv"), "r");

        if ($csvFile === false) {
            $this->command->error("Impossibile aprire il file CSV: $csvFilePath");
            return;
        }

        // Inizializza un array per memorizzare i dati
        $data = [];

        // Leggi il file CSV riga per riga
        while (($row = fgetcsv($csvFile)) !== false) {
            // Aggiungi ogni riga come un array associativo all'array $data
            $data[] = [
                    "id" => $row[0],
                    "title" => $row[2],
                    "body" => $row[7],
                    "short_body" => $row[9],
                    "published_at" => $row[3],
                    "enabled" => $row[12],
                    "category_id" => ($row[4] === 'NEWS') ? 1 : (($row[4] === 'EVENTS') ? 2 : 3),
                    "link" => $row[11],
                    "social_id" => ($row[5] == 'NULL') ? '1' : $row[5],
                    "order_column" => $row[1],
                    "created_at" => $row[16],
                    "updated_at" => $row[17]
            ];
        }

        // Chiudi il file CSV
        fclose($csvFile);

        // Converte l'array $data in formato JSON
        $jsonData = json_encode($data);

        // Salva il JSON in un file
        $jsonFilePath = base_path("database/data/posts.json"); // Modifica il percorso se necessario
        file_put_contents($jsonFilePath, $jsonData);

        $this->command->info('Esportazione CSV completata e JSON salvato con successo.');
    }
}
