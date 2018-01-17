#!/usr/bin/env php
<?php
/*
** EPITECH PROJECT, 2018
** 105torus
** File description:
** 105torus project
*/

require_once "src/Utils.class.php";

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

printf("Iteration number too high.");
exit(84);
