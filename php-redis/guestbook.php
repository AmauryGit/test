<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

Predis\Autoloader::register();

if (isset($_GET['cmd']) === true) {
  $host = 'redis-10137.c93.us-east-1-3.ec2.cloud.redislabs.com';
  header('Content-Type: application/json');
  if ($_GET['cmd'] == 'set') {
	  $options = [
			'parameters' => [
				'username' => "default",
				'password' => "tfpuM2jUw0PeKTM1LH3rFRCl9uC7ImNL"
			],
		];

    $client = new Predis\Client([
      'scheme' => 'tcp',
      'host'   => $host,
      'port'   => 10137,
    ],$options);

    $client->set($_GET['key'], $_GET['value']);
    print('{"message": "Updated"}');
  } else {
  $host = 'redis-10137.c93.us-east-1-3.ec2.cloud.redislabs.com';
	$options = [
			'parameters' => [
				'username' => "default",
				'password' => "tfpuM2jUw0PeKTM1LH3rFRCl9uC7ImNL"
			],
		];
    $client = new Predis\Client([
      'scheme' => 'tcp',
      'host'   => $host,
      'port'   => 10137,
    ],$options);

    $value = $client->get($_GET['key']);
    print('{"data": "' . $value . '"}');
  }
} else {
  phpinfo();
} ?>