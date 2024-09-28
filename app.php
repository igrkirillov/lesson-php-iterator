<?php

require_once (__DIR__ . '/autoload.php');
spl_autoload_register("autoload");

use Model\Person as Person;
use Model\PersonList as PersonList;

$ivan = new Person("Ivan", 35, 170);
$mary = new Person("Mary", 18, 192);

$personList = new PersonList(array($mary, $ivan));

foreach ($personList as $person) {
    echo $person . PHP_EOL;
}

$igor = new Person("Igor", 37, 176);
$serialized = serialize($igor);

fwrite(STDOUT, $serialized . PHP_EOL);
fwrite(STDOUT, unserialize($serialized) . PHP_EOL);

fwrite(STDOUT, "До подмены: " . $serialized . PHP_EOL);
$serialized = str_replace("Igor", "Vova", $serialized);
fwrite(STDOUT, "После подмены: " . $serialized . PHP_EOL);
fwrite(STDOUT, unserialize($serialized) . PHP_EOL);