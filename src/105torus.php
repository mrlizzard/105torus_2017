#!/usr/bin/env php

<?php
/*
** EPITECH PROJECT, 2018
** 105torus
** File description:
** 105torus project
*/

use Methods\BisectionMethod;

$obj = NULL;
$args = count($argv);

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