<?php
// user_change_cards.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_4
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 16:10:38 2017 SELATNI Ryad
// Last update Thu Feb 16 17:31:54 2017 SELATNI Ryad
//

function	change_cards($deck_user, $name)
{
  $on;
  $main = [$deck_user[0], $deck_user[1], $deck_user[2]];
  $tmp = [$deck_user[3], $deck_user[4], $deck_user[5],$deck_user[6], $deck_user[7], $deck_user[8],$deck_user[9]];
  $new_deck;
  
  echo "Voici vos 3 cartes en main :\n";
  display_main($main);
  echo "Voulez-vous changer vos cartes? [OUI | NON]\n$name : ";
  $on = readline();
  while ($on != "OUI" && $on != "NON")
    {
      echo "Je n'ai pas compris votre choix?\n$name :";
      $on = readline();
    }
  if ($on == "OUI")
    {
      $new_deck = $tmp;
      $new_deck[7] = $deck_user[0];
      $new_deck[8] = $deck_user[1];
      $new_deck[9] = $deck_user[2];
      echo "Votre main a changer... \n";
      return ($new_deck);
    }
  else
    echo "Vous conserver votre deck\n";
  return ($deck_user);
}