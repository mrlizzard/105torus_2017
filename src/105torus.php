#!/usr/bin/env php
<?php
/*
** EPITECH PROJECT, 2018
** 105torus
** File description:
** 105torus project
*/

include "src/Methods/BisectionMethod.class.php";
include "src/Methods/NewtonMethod.class.php";
include "src/Methods/SecantMethod.class.php";
include "Utils.class.php";

use Methods\BisectionMethod;
use Methods\NewtonMethod;
use Methods\SecantMethod;

$utils = new Utils();
$method = NULL;
$start = 1;
$verbose = false;
$disp_func = false;

// Check help flag and arguments number
$utils->check_help($argv);
$utils->check_flags($argv);

// Check if all arguments is numeric (except the first)
for ($loop = $start; $loop < (($start == 1 ? 8 : 9)); $loop++) { 
	if (!is_numeric($argv[$loop])) {
		printf("One of the arguments isn't a number.\n");
		exit(84);
	}
}

// Get the method to adopt
$nmet = $argv[$start];

if ($nmet == 1) {
	$method = new BisectionMethod($argv, $verbose, $disp_func);
} else if ($nmet == 2) {
	$method = new NewtonMethod($argv, $verbose, $disp_func);
} else if ($nmet == 3) {
	$method = new SecantMethod($argv, $verbose, $disp_func);
} else {
	$method = NULL;
}

// Invalid method used
if ($method == NULL) {
	printf("Method must be between 0 and 2 (included)\n");
	exit(84);
}

// Calculus and display method resolution
$method->calcul();
$method->display();

exit(0);
