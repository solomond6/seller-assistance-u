<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CsvImport;
use App\Models\CsvError;
use Storage;

class ProcessImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $uploadPath = storage_path("app/public/upload");

        $files = scandir($uploadPath, SCANDIR_SORT_DESCENDING);
        $newest_file = $files[0];
        
        $fileStream = fopen($uploadPath.'/'.$newest_file, 'r');
        
        while (($lines = fgetcsv($fileStream)) !== false) {

            foreach($lines as $key => $line){
                $lineArray = explode(';', $line);
                if(!in_array(null, $lineArray, true)){
                    CsvImport::create([
                        'column1'=>$lineArray[0],
                        'column2'=>$lineArray[1],
                        'column3'=>$lineArray[2],
                        'column4'=>$lineArray[3],
                        'column5'=>$lineArray[4],
                        'column6'=>$lineArray[5],
                        'column7'=>$lineArray[6],
                        'column8'=>$lineArray[7],
                    ]);
                }else{
                    CsvError::create([
                        'line_details'=>json_encode($lineArray)
                    ]);
                }
                
            }
            
        }
 
        // Close the file
        fclose($fileStream);
    }
}
