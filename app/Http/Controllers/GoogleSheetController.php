<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheetController extends Controller
{
    public function index()
    {
        // Load Google API credentials from .env
        $serviceAccountJsonPath = env('GOOGLE_SHEET_CREDENTIALS_JSON');

        // Create a Google API client
        $client = new Client();
        $client->setAuthConfig($serviceAccountJsonPath);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Create a Sheets service instance
        $sheetsService = new Sheets($client);

        // Define the spreadsheet ID and range
        $spreadsheetId = '1I72sE5lvbDUHtbKpBM2hOSbr7oR-TI-xi0e2RLN99KE';
        $range = 'PalmateSolution';

        // Fetch data from the Google Sheet
        $response = $sheetsService->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();

        if ($values===null) {
            $data = [];
        } else {
            $data = $values;
        }

        // Process and display the data
        return view('google-sheet', compact('data'));
    }
}
