<?php
/*
 Template Name: Google Sheet
*/
?>
<?php
include (TEMPLATEPATH . '/googlesheet/vendor/autoload.php'); 
$client = new Google_Client();

$client->setAuthConfigFile(TEMPLATEPATH . '/credentials.json');
$client->setRedirectUri('https://renaissance.ac.in/google-sheet/');
$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
$client->setIncludeGrantedScopes(true);
$client->setAccessType('offline');
if ( isset( $_GET['code'] )) {

    if($client->isAccessTokenExpired()){

        $client->authenticate($_GET['code']);

        $accessToken = $client->getAccessToken();
        $refreshToken = $client->getRefreshToken();

        $analytica_tokens = json_encode( array( 'time' => current_time( 'mysql' ),'accessToken' =>  $accessToken, 'refreshToken' => $refreshToken ) );
        update_option( 'analytica_tokens', $analytica_tokens );
    } 
} else {
    $resultset = json_decode(get_option('analytica_tokens'));

    if ($client->isAccessTokenExpired()) {
        if( isset( $resultset ) ){
            $refreshToken = $resultset->refreshToken;
            $client->refreshToken( $refreshToken );
            $accessToken = $client->getAccessToken();           
            $analytica_tokens = json_encode( array( 'time' => current_time( 'mysql' ), 'accessToken' =>  $accessToken, 'refreshToken' => $refreshToken ) );
            update_option( 'analytica_tokens', $analytica_tokens );
        } else {
            echo 'You need to reauthorize the application to get the analytics report.';
        }
    }
}
$auth_url = $client->createAuthUrl();
?>
 <a class="connect-to-google-analytics" href='<?php echo $auth_url; ?>'  id="loginText">Connect To Your Google Analytics Account </a>
<?php
if( isset($accessToken) ){
    $_SESSION['access_token'] = $accessToken ? $accessToken : $refreshToken;
    $client->setAccessToken($_SESSION['access_token']);
    // Create an authorized analytics service object.
    $analytics = new Google_Service_Analytics($client);

    // Get the first view (profile) id for the authorized user.
    $profile = $this->getFirstProfileId($analytics);

    // Get the results from the Core Reporting API and print the results.
    $this->results = $this->getResults($analytics, $profile);
}
?>


<?php
//get_footer();
