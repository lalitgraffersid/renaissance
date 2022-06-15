<?php
require __DIR__ . '/googlesheet/vendor/autoload.php';

/*if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
*/
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
    $client->setAuthConfig('credentials.json');
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
// use Google\Cloud\Translate\TranslateClient;

// Prints the names and majors of students in a sample spreadsheet:
// https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
// $spreadsheetId = '1WMm7xvkWJyM9HUd6O8GqCaI3u_N0TRVq8ur819VGL-k';
$spreadsheetId = '1Y84Fi0EzMil4DolGuDuOdJyu-ssbiSnmuSR_oIJWud4';
// $range = 'AH_30.9.18!B6:B';
$range = 'Class Data!A2:F';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

if (empty($values)) {
    print "No data found.\n";
} else {
    // print "Name:\n";
    echo "<pre>";
    // print_r($values);
    $total_record    = count($values);
    $record_per_slot = 10;
    $batchcount = ceil($total_record/$record_per_slot);
    $first = 0;
    $limit = $record_per_slot;
    for($i=1;$i<=$batchcount; $i++)
    {
        echo $first.','.$limit.'<br>';
        print_r(array_slice($values,$first,$limit));

        $first = $first+$limit;
    }
    print_r(array_slice($values,0,10));

     // print_r($values); 
    die('hjk');
    foreach ($values as $row) {
        // Print columns A and E, which correspond to indices 0 and 4.
        printf("%s, <br>\n", $row[0]);
       
        // $url = 'http://www.google.com/inputtools/request?text='.$row[0].'&ime=transliteration_en_hi';
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
                echo $toolResponse[1][0][1][0];
            }
          }
        curl_close($ch);
        // $text = 'The text to translate."
        // $targetLanguage = 'ja';  // Which language to translate to?

        /*$translate = new Google_Service_Translate($client);
        // $result = $translate->translations->translate($row[0],'hi');
        // $result = $translate->translations->translate( $row[0] );
        $result = $translate->translations->translate([
            'text'   =>$row[0],    
            'target' => 'hi',
        ]);
*/



        // echo "<pre>"; print_r($result);
    }
}


 
       
            

            
            
    


/*// The A1 notation of the values to update.
$range = 'my-range';  // TODO: Update placeholder value.
 "values": [
    [],
    []
  ],
// TODO: Assign values to desired properties of `requestBody`. All existing
// properties will be replaced:
$requestBody = new Google_Service_Sheets_ValueRange();

$response = $service->spreadsheets_values->update($spreadsheetId, $range, $requestBody);

// TODO: Change code below to process the `response` object:
echo '<pre>', var_export($response, true), '</pre>', "\n";*/
