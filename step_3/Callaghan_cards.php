<?php
// Callaghan_cards.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_3
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 14:41:37 2017 SELATNI Ryad
// Last update Thu Feb 16 15:32:00 2017 SELATNI Ryad
//

function	Callaghan_s_cards($authorized_cards, $j)
{
  $i = 0;
  $deck_C;

  while ($i != 10)
    {
      $deck_C[$i] = $authorized_cards[rand(0, $j - 1)];
      $i++;
    }
  return($deck_C);
}

function	Callaghan_select_cards_class($Callaghan, $cards)
{
  $i = 0;
  $j = 0;
  $nb_cards_class = 0;
  $authorized_cards;
  
  while (isset($cards[$i]))
    {
      if ($cards[$i]["classe_joueur"])
	{
	  $authorized_cards[$j] = $cards[$i];
	  $j++;
	  $nb_cards_class++;
	}
      $i++;
    }
  return(Callaghan_s_cards($authorized_cards, $j));
}