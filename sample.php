<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use ChooseMyCar\FeedFilterer;
use ChooseMyCar\Renderer\ArrayRenderer;

$feed = new FeedFilterer('test_task_data.csv');

$data = $feed->setYear(2016)->render((new ArrayRenderer));

var_dump($data);
