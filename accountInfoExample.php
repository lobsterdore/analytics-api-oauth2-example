<?php
// api dependencies
require 'vendor/autoload.php';

// create client object and set app name
$client = new Google_Client();
$client->setApplicationName('Service Account-project'); // name of your app

// set assertion credentials
$client->setAssertionCredentials(
	new Google_Auth_AssertionCredentials(
		'[ID]@developer.gserviceaccount.com', // email you added to GA
		array('https://www.googleapis.com/auth/analytics.readonly'),
		file_get_contents('[KEY-FILE]') // keyfile you downloaded
	)
);

// other settings
$client->setClientId('[ID].apps.googleusercontent.com'); // from API console

// create service and get data
$service = new Google_Service_Analytics($client);

var_dump($service->management_accounts->listManagementAccounts());
?>
