#!/usr/bin/env php
<?php
// my_hearthstone.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_1
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 09:26:16 2017 SELATNI Ryad
// Last update Thu Feb 16 17:26:14 2017 SELATNI Ryad
//

require('verify_identity.php');
require('error.php');
require('select_adversary.php');
require('init_game.php');
require('step_2.php');
require('Callaghan_cards.php');
require('pile_ou_face.php');
require('user_change_cards.php');
require('battle.php');

function	who_are_you($ac, $av)
{
  $ennemy;

  if(enough_arg($ac,$av) == 1)
    return (0);
  else
    echo "Bienvenue sur my_Heart_Stone $av[1] $av[2] !!!\n";
  $joueur[0] = $av[1];
  $joueur[1] = $av[2];
  $cards = scan_dir();
  $deck_user = alea_deck(constr_user_deck($cards, $joueur[1]));
  echo "Votre deck est pret! \n";
  $Callaghan = select_ennemy($av[1]);
  $deck_C = Callaghan_select_cards_class($Callaghan, $cards);
  echo "$joueur[0] $joueur[1] VS $Callaghan[0] $Callaghan[1]!\n";
  $joueur[2] = 15;
  $Callaghan[2] = 15;
  $joueur[3] = 0;
  $Callaghan[3]= 0;
  $joueur[4]=rand(0,1);
  $joueur[4] == pile_face($joueur);
  $deck_user = change_cards($deck_user,$joueur[0]);
  battle($joueur, $deck_user, $Callaghan, $deck_C);
}

who_are_you($argc, $argv);