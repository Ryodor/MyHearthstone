<?php
// init_game.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_4
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 12:13:52 2017 SELATNI Ryad
// Last update Thu Feb 16 13:13:15 2017 SELATNI Ryad
//

function	begin_fight($Callaghan,$joueur)
{
  $turn = rand(1,2);
  if ($turn == 1)
    echo "Vous commencer : \n";
  else
    echo "Callaghan commence :\n";
  $Callaghan[2] = 15;
  $joueur[2] = 15;
}