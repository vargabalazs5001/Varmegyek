<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportCounties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-counties {fileName} {database?}';

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
    public function __construct(){
        parent::__construct();
    }
    public function handle()
    {
        $fileName = $this->argument(key: 'fileName');
        $csvData = $this->getCSVData($fileName);
        var_dump($csvData);
        return 0;

        $schemaName = $this->argument('app:import-counties') ?: config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset",'utf8_hungarian_ci');
        $collation = config("database.connections.mysql.collation",'utf8_hungarian_unicode_ci');

        config(["database.connections.mysql.database" => null]);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

        try {
            DB::statement($query);
            echo "$schemaName database has been created.";
        }
        catch (Exception $e) {
            $e->getMessage();
        }

        config(["database.connections.mysql.database" => $schemaName]);
    }
    private function getCSVData($fileName, $withHeader = true){
        $arrResult  = array();
        if(!file_exists($fileName)){
            $this->error("A $fileName nem létezik!");
            return false;
        }
        $csvFile = fopen($fileName, 'r');
        $header = fgetcsv($csvFile);
        if($withHeader){
            $lines[] = $header;
        }
        else{
            $lines = [];
        }
        while(!feof($csvFile)){
            $line = fgetcsv($csvFile);
            $lines[] = $line;
        }
        fclose($csvFile);
        return $lines;
    }    
}