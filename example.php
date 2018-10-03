<?php

require_once __DIR__ . '/vendor/autoload.php';

use Loremizer\loremizer;


echo "<h1>".loremizer::getTitle()."<small><br />".
loremizer::getImg(true, 150, 50)."</small></h1>";

echo loremizer::getTitle(true, 'h2');

echo "<p>".loremizer::getPhrase(1)."</p>";

echo loremizer::getImg(true);

echo "<p>".loremizer::getParagraph(10, true)."</p>";

echo "<img src='".loremizer::getImg()."' />";
