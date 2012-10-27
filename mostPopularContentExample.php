<?php
// api dependencies
// svn checkout http://google-api-php-client.googlecode.com/svn/trunk/ google-api-php-client-read-only
require_once('google-api-php-client-read-only/src/Google_Client.php');
require_once('google-api-php-client-read-only/src/contrib/Google_AnalyticsService.php');

// create client object and set app name
$client = new Google_Client();
$client->setApplicationName('Most popular'); // name of your app

// set assertion credentials
$client->setAssertionCredentials(
  new Google_AssertionCredentials(
    '', // email you added to GA
    array('http://www.googleapis.com/auth/analytics.readonly'),
    file_get_contents('')  // keyfile you downloaded
));

// other settings
$client->setClientId('');           // from API console

// create service and get data
$service = new Google_AnalyticsService($client);

$response = $service->data_ga->get(
        '', // profile id
        '2012-08-01', // start date
        '2012-09-16', // end date
        'ga:uniquePageviews',
        array(
            'dimensions' => 'ga:pagePath',
            'sort' => '-ga:uniquePageviews',
            'filters' => 'ga:pagePath=~\/[a-zA-Z0-9\-]+\/[a-zA-Z0-9\-]+', // example url filter
            'max-results' => '25'));
var_dump($response);
?>





