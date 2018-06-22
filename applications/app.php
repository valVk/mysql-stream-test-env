<?php

require __DIR__ . '/vendor/autoload.php';
$loop = React\EventLoop\Factory::create();
$options = array(
  'host'   => 'react-db',
  'port'   => 3306,
  'user'   => 'root',
  'passwd' => '',
  'dbname' => 'mds_en'
);

$connection = new React\MySQL\Connection($loop, $options);

$connection->connect(function (?Exception $error, $connection) {
  if ($error) {
      echo 'Connection failed: ' . $error->getMessage();
  } else {
      echo 'Successfully connected';
  }
});

// $stream = $connection->queryStream('SELECT * FROM core_resource_tests');

// $stream->on('data', function ($row) {
//     echo 'core_resource1 ' . $row['id'] . PHP_EOL;
// });

// $stream->on('end', function () {
//     echo 'Completed.';
// });

// $stream->on('error', function($e) {
//   var_dump($e->getMessage());
// });


$coreResource = $connection->query('SELECT * FROM core_resource_tests');

$coreResource->on('result', function ($result, $command, $conn) {
  if ($command->hasError()) {
    $error = $command->getError();
    echo 'Error: ' . $error->getMessage() . PHP_EOL;
  } else {
    echo 'CORE RESOURCE2 ' . $result['id'] . ' - ' . $result['resource'] . PHP_EOL;
  }
});

$loop->run();