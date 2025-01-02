#!/usr/bin/env php
<?php

use Orbitphpframework\Orbit\Framework;

require __DIR__ . '/../../vendor/autoload.php';



$framework = new Framework();

// Parse arguments
$args = $argv;
array_shift($args); // Remove the script name
$command = $args[0] ?? 'help';

// Run the command
$framework->run($command, array_slice($args, 1));
