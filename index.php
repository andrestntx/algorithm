<?php

require 'src/Facades/Random.php';
require 'src/TextString.php';
require 'src/Collection.php';
require 'src/ComparatorCollection.php';
require 'src/Comparator.php';
require 'src/ComparatorService.php';
require 'src/Logger/Logger.php';
require 'src/Facades/Log.php';
require 'src/Logger/HtmlLogger.php';
require 'src/Logger/FileLogger.php';


Log::setLogger(new HtmlLogger());
Random::setCharacters("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ");

$result = ComparatorService::compare(5, new TextString("THIS CODE IS BULLSHIT"), 100);


