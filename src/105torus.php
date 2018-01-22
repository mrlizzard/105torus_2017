#!/usr/bin/env php
<?php
/*
** EPITECH PROJECT, 2018
** 105torus
** File description:
** 105torus project
*/

require_once "src/Utils.class.php";

// Only passed on units tests
if (!isset($argv)) {
	$argv = array(
		"./105torus",
		rand(1, 3),
		rand(-10, 15),
		rand(-10, 15),
		rand(-10, 15),
		rand(-10, 15),
		rand(-10, 15),
		rand(1, 16)
	);
}

$utils = new Utils();
$method = NULL;

// Check help flag and arguments number
$utils->check_help($argv);
$utils->check_flags($argv);
$utils->check_arguments($argv);

// Method selection and action !
$method = $utils->select_method($argv);
$method->calcul();
$method->display();

exit(0);
