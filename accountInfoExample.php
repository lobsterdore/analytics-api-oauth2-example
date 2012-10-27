<?php
// api dependencies
// svn checkout http://google-api-php-client.googlecode.com/svn/trunk/ google-api-php-client-read-only
require_once('google-api-php-client-read-only/src/Google_Client.php');
require_once('google-api-php-client-read-only/src/contrib/Google_AnalyticsService.php');

// create client object and set app name
$client = new Google_Client();
$client->setApplicationName(''); // name of your app

// set assertion credentials
$client->setAssertionCredentials(
    new Google_AssertionCredentials(
        '', // email you added to GA
        array('https://www.googleapis.com/auth/analytics.readonly'),
       file_get_contents('') // keyfile you downloaded
    )
);

// other settings
$client->setClientId(''); // from API console

// create service and get data
$service = new Google_AnalyticsService($client);

var_dump($service->management_accounts->listManagementAccounts());
?>
