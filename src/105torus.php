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

// Check help flag and arguments number
if ($args == 2 && $argv[1] == "-h") {
	printf("USAGE:\n\t./105torus opt a0 a1 a2 a3 a4 n\n\n");
	printf("DESCRIPTION:\n");
	printf("\topt\tMethod number (0: bisection, 1: newton, 2: secant)\n");
	printf("\ta(i)\tCoefficients of the equation\n");
	printf("\tn\tPrecision\n\t\t(meaning the application of the polynomial to the solution should be smaller than 10^-n)\n");
	exit(0);
} else if ($args != 8) {
	printf("Too much/less arguments. Only 7 arguments needed.\n");
	exit(84);
}

// Check if all arguments is numeric (except the first)
for ($loop = 1; $loop < 8; $loop++) { 
	if (!is_numeric($argv[$loop])) {
		printf("One of the arguments isn't a number.\n");
		exit(84);
	}
}

// Get the method to adopt
switch ($argv[1]) {
	case 0:
		$method = new BisectionMethod($argv);
		break;

	case 1:
		$method = new NewtonMethod($argv);
		break;

	case 2:
		$method = new SecantMethod($argv);
		break;
	
	default:
		$method = NULL;
		break;
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
