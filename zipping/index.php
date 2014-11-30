<?php

require_once 'classes/Zipper.php';

$zipper = new Zipper;

$zipper->add(array('files/1.txt', 'files/2.txt'));
$zipper->add('test.txt');

$zipper->store('files/test.zip');
