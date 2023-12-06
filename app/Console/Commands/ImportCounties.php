<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\County;

class ImportCounties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-counties {fileName} {database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A megadott .csv fájlból importálja a vármegyéket a megadott adatbázisba';

    /**
    * Execute the console command.
    *
    * @return void
    */
    private function getCounties($csvData){
        $county = '';
        $counties = [];
        
        foreach ($csvData as $row) {
            if(!is_array($row)){
                continue;
            }
           if($county != $row[0]){
                $county = $row[0];
                $counties[] = $county;
           }
        }
        return $counties;
    }
    private function createCounties($counties){
        if(!$counties){
            return 0;
        }
        foreach ($counties as $county) {
            echo "$county\n";
            County::create(['name'=> $county]);
            $this->info('Vármegye hozzáadva: ' . $county);
        }
        return true;
    }


    public function handle()
    {
        $fileName = $this->argument('fileName');
        $csvData = $this->getCSVData($fileName);
        $counties = $this->getCounties($csvData);
        $this->createCounties($counties);
    }
    private function getCSVData($fileName, $withHeader = true){
        if (!file_exists($fileName)) {
            echo "$fileName nem találhetó";
            return false;
        }
        $csvFile = fopen($fileName,'r');
        $header = fgetcsv($csvFile);
        if ($withHeader){
            $lines[] = $header;
        }
        else{
            $lines[] = $header;
        }
        while (! feof($csvFile)) {
            $line = fgetcsv($csvFile);
            $lines[] = $line;
        }
        fclose($csvFile);

        return $lines;
    }
}