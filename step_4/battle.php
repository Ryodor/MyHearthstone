<?php
// battle.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_4
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 16:40:09 2017 SELATNI Ryad
// Last update Thu Feb 16 17:03:24 2017 SELATNI Ryad
//

function display_main($tab)
{
  $i = 0;
  while (isset($tab[$i]))
    {
      $to_add = "";
      if ($tab[$i]["type"] != "sort")
	$to_add = ", A : " . $tab[$i]["points"]["attaque"] . ", V : " . $tab[$i]["points"]["vie"];
      echo (($i + 1) . ". " . $tab[$i]["nom"] . ", M : " . $tab[$i]["points"]["mana"] . $to_add . "\n");
      $i++;
    }
}
