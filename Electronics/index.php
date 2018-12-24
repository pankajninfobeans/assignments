<?php
use Electronics\TV;
use Electronics\TvRemote;

require_once "TvRemote.php";
require_once "TV.php";

echo "-- Sony Bravia 40' LED TV --" . PHP_EOL;

$tv = new TV('Sony', 'Bravia', "40", "LED");
//Create Remote Object
$remote = new TvRemote($tv);

echo "Turn on the TV".PHP_EOL . PHP_EOL;
$remote->operation("on");
echo "TV status is:".$tv->getStatus();
echo PHP_EOL;

echo "Increasing Volume of TV:" . PHP_EOL;
$remote->operation("up");
echo "TV volume set to: " . $tv->getVolume();
echo PHP_EOL;

echo "Decreasing Volume of TV:" . $remote->operation("down");
echo "TV volume set to: " . $tv->getVolume();
echo PHP_EOL;

echo "Changing the TV channel to next:" . $remote->operation("next");
echo "TV channel set to: " . $tv->getChannel();
echo PHP_EOL;

echo "Changing the TV channel to previous:" . $remote->operation("prev");
echo "TV channel set to: " . $tv->getChannel();
echo PHP_EOL . PHP_EOL;

echo "Turn off the TV" . $remote->operation("off").PHP_EOL;
echo PHP_EOL;

?>