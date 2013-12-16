<?php
// api dependencies
require 'vendor/autoload.php';

// create client object and set app name
$client = new Google_Client();
$client->setApplicationName("GA Example");

// set assertion credentials
$client->setAssertionCredentials(
    new Google_Auth_AssertionCredentials(
        '[ID]@developer.gserviceaccount.com', // email you added to GA
        array('https://www.googleapis.com/auth/analytics.readonly'),
        file_get_contents('[KEY-FILE]') // keyfile you downloaded
    )
);

// other settings
$client->setClientId('[ID].apps.googleusercontent.com');           // from API console

// create service and get data
$service = new Google_Service_Analytics($client);

$response = $service->data_ga->get(
    'ga:[VIEW-ID]', // profile id
    '2014-01-01', // start date
    '2014-02-01', // end date
    'ga:uniquePageviews',
    array(
        'dimensions' => 'ga:pagePath',
        'sort' => '-ga:uniquePageviews',
        'filters' => 'ga:pagePath=~\/[a-zA-Z0-9\-]+\/[a-zA-Z0-9\-]+', // example url filter
        'max-results' => '25'
    )
);
var_dump($response);
?>
