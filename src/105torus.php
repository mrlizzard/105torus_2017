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

use Methods\BisectionMethod;
use Methods\NewtonMethod;
use Methods\SecantMethod;

$method = NULL;
$args = count($argv);
$start = 1;
$verbose = false;
$disp_func = false;

// Check help flag and arguments number
if ($args == 2 && $argv[1] == "-h") {
	printf("USAGE:\n\t./105torus [-v,--verbose,-f,--func] opt a0 a1 a2 a3 a4 n\n\n");
	printf("DESCRIPTION:\n");
	printf("\t-v, --verbose\tVerbose mode (debug)\n");
	printf("\t-f, --func\tDisplay function at the end of iterations\n");
	printf("\topt\t\tMethod number (0: bisection, 1: newton, 2: secant)\n");
	printf("\ta(i)\t\tCoefficients of the equation\n");
	printf("\tn\t\tPrecision (meaning the application of the polynomial\n");
	printf("\t\t\tto the solution should be smaller than 10^-n)\n");
	exit(0);
} else if ($args == 9 && ($argv[1] == "-v" || $argv[1] == "--verbose")) {
	$start++;
	$verbose = true;
	printf("Verbose mode actived.\n");
} else if ($args == 9 && ($argv[1] == "-f" || $argv[1] == "--func")) {
	$start++;
	$disp_func = true;
} else if ($args != 8) {
	printf("Too much/less arguments. Only 7 (or 8) arguments needed.\n");
	exit(84);
}

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
