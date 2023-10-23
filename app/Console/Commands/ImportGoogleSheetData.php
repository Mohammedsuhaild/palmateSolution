<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Google\Client;
use Google\Service\Sheets;

class ImportGoogleSheetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-google-sheet-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
        $client->setAuthConfig($serviceAccountJsonPath);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        
        $service = new Sheets($client); // Create a new Sheets service instance.
        
        $spreadsheetId = '1I72sE5lvbDUHtbKpBM2hOSbr7oR-TI-xi0e2RLN99KE';
        $range = 'PalmateSolution';  // Update to match your sheet name or range.
        
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
        
        if (empty($values)) {
            $this->info('No data found.');
        } else {
            // Process and save the data to the Laravel database here.
        
        
             // Process and save the data to the Laravel database here.
             // ImportGoogleSheetData.php

foreach ($values as $row) {
    GoogleSheetData::create([
        'firstname' => $row[0],
        'lastname' => $row[1],
        'email' => $row[2],
    ]);
}

         }
     }
    }

