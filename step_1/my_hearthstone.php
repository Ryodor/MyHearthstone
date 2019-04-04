#!/usr/bin/env php
<?php
// my_hearthstone.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_1
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 09:26:16 2017 SELATNI Ryad
// Last update Thu Feb 16 11:00:47 2017 SELATNI Ryad
//

require('verify_identity.php');
require('error.php');

function	who_are_you($ac, $av)
{
  if(enough_arg($ac,$av) == 1)
    return (0);
  else
    echo "Bienvenue sur my_Heart_Stone $av[1] $av[2] !!!\n";
}

who_are_you($argc, $argv);