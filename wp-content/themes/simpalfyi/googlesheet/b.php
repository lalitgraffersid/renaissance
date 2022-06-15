<?php
require __DIR__ . '/vendor/autoload.php';

/*
 * We need to get a Google_Client object first to handle auth and api calls, etc.
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAuthConfig('Quickstart-c4b7e1f3b3e9.json');
    // $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

/*
 * To read data from a sheet we need the spreadsheet ID and the range of data we want to retrieve.
 * Range is defined using A1 notation, see https://developers.google.com/sheets/api/guides/concepts#a1_notation
 */
$data = [];

// The first row contains the column titles, so lets start pulling data from row 2
$currentRow = 6;
$hindiName  = '';
// The range of A2:H will get columns A through H and all rows starting from row 2
// $spreadsheetId = '1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms';
// $spreadsheetId = '1drMDeniaWd7-S_F2hiw5tNbo6t_KlgvubX9pnIRTTGc';
$spreadsheetId = '16iLRK8YXq-uCZvwa8AUxECnmgXqUFdUgXDSOLOnv0gc'; //my HI
$range = 'AH_30.9.18!B6:B';
$rows  = $service->spreadsheets_values->get($spreadsheetId, $range);
// echo "<pre>"; print_r($rows); die('jkl'); 
if (isset($rows['values'])) {

    $total_record    = count($rows['values']);
    $record_per_slot = 1000;
    $batchcount = ceil($total_record/$record_per_slot);
    $first = 0;
    $limit = $record_per_slot;
    for($i=1;$i<=$batchcount; $i++) {
    
        foreach (array_slice($rows['values'],$first,$limit) as $row) {
            /*
             * If first column is empty, consider it an empty row and skip (this is just for example)
             */
            if (empty($row[0])) {
                break;
            }

            $data[] = [
                'col-a' => $row[0],
            ];

            /*
             * Now for each row we've seen, lets update the I column with the current date
             */

            $base_url = 'http://www.google.com/inputtools/request';
            $params = array('text' =>$row[0],'ime'=>'transliteration_en_hi');
            $url = $base_url . '?' . http_build_query($params);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);  
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json'
            ));
            $response = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $toolResponse = json_decode($response,true);
              if($toolResponse[0]=='SUCCESS'){
                if(!empty($toolResponse[1]) && $toolResponse[1][0]){
                    $hindiName =  $toolResponse[1][0][1][0];
                }
              }
            curl_close($ch);

            $updateRange = 'B'.$currentRow;
            $updateBody = new Google_Service_Sheets_ValueRange([
                'range' => $updateRange,
                'majorDimension' => 'ROWS',
                'values' => ['values' => $hindiName],
            ]);
            $service->spreadsheets_values->update(
                $spreadsheetId,
                $updateRange,
                $updateBody,
                ['valueInputOption' => 'USER_ENTERED']
            );

            $currentRow++;
        }

        $first = $first+$limit;

    }
}
