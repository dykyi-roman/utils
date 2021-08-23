<?php

require_once "vendor/autoload.php";

use App\Filter\Char;
use App\Filter\CoincidenceFilter;
use App\Filter\FilterCollection;
use App\Filter\CharReplaceFilter;
use App\FilterCommand;
use App\Processor;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(
    new FilterCommand(
        new Processor(
            new FilterCollection(
                new CoincidenceFilter(),   // Dick
                new CharReplaceFilter(new Char('*')), // D*ck
                new CharReplaceFilter(new Char('1')), // D1ck
                new CharReplaceFilter(new Char('0')), // Ch0ad
            )
        )
    )
);
$application->run();
