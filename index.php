<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\questions;

$link = 'https://raw.githubusercontent.com/lydiahallie/javascript-questions/master/vi-VI/README-vi.md';

$questions = new questions();
$questions->readMdFile($link);
$array = $questions->all();
//dump($array[0]->getAnswer());
dd($array);

