<?php

use Symfony\Component\Yaml\Parser;

$yaml = new Parser();

try {
	$value = $yaml->parse(file_get_contents(__DIR__ . '/../config/dbconfig.yaml'));
} catch (ParseException $e) {
    printf("Unable to parse the YAML string: %s", $e->getMessage());
}


$container['dbhost'] = $value['dbhost'];
$container['dbport'] = $value['dbport'];
$container['dbuser'] = $value['dbuser'];
$container['dbpass'] = $value['dbpass'];
$container['dbdatabase'] = $value['dbdatabase'];

try {
	$value = $yaml->parse(file_get_contents(__DIR__ . '/../config/config.yaml'));
} catch (ParseException $e) {
    printf("Unable to parse the YAML string: %s", $e->getMessage());
}

$container['tpldir'] = $value['template']['dir'];
$container['logdir'] = $value['logger']['path'];
$container['logfile'] = $value['logger']['name'];

try {
	$value = $yaml->parse(file_get_contents(__DIR__ . '/../config/router.yaml'));
} catch (ParseException $e) {
    printf("Unable to parse the YAML string: %s", $e->getMessage());
}

$container['routes'] = $value['routes'];
