<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFilePath = base_path("database/data/posts2.csv");


// Array di colonne da mantenere (indice delle colonne in base a zero)
$colonneDaMantenere = [0, 2, 3, 4, 5, 7, 11, 12, 16, 17]; // Ad esempio, mantieni la colonna 1, 3 e 4
// Ad esempio, mantieni la colonna 1, 3 e 4

// Percorso del file CSV modificato
$csvFilePathModificato = base_path("database/data/posts_lite.csv");

if (($handle = fopen($csvFilePath, 'r')) !== false) {
            if (($handleModificato = fopen($csvFilePathModificato, 'w')) !== false) {
                while (($row = fgetcsv($handle)) !== false) {
                    $nuovaRiga = [];

                    foreach ($colonneDaMantenere as $indiceColonna) {
                        if (isset($row[$indiceColonna])) {
                            $nuovaRiga[] = $row[$indiceColonna];
                        }
                    }

                    fputcsv($handleModificato, $nuovaRiga);
                }

                fclose($handleModificato);
            } else {
                echo "Impossibile creare il file CSV modificato.";
            }

            fclose($handle);
            
            } else {
                echo "Impossibile aprire il file CSV originale.";
            }
    }
}
