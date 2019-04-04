<?php
// error.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_1
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 09:47:16 2017 SELATNI Ryad
// Last update Thu Feb 16 10:55:03 2017 SELATNI Ryad
//

function	error_sentence($i)
{
  $tab[0]="Vous devez rentrer votre psuedo et la classe choisi :\n - Mage\n - Chasseur\n - Druide\n - Paladin\n - Prêtre\n - Voleur\n - Chaman\n - Démoniste\n - Guerrier\n";
  $tab[1]="Votre pseudo ne doit pas etre un nombre et doit faire entre 3 et 16 caracteres\n";
  $tab[2]="Cette classe n'existe pas :\n - Mage\n - Chasseur\n - Druide\n - Paladin\n - Prêtre\n - Voleur\n - Chaman\n - Démoniste\n - Guerrier\n";
  echo $tab[$i];
  return (1);
}