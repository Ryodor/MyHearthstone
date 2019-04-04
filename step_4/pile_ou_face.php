<?php
// pile_ou_face.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone/step_4
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 15:38:29 2017 SELATNI Ryad
// Last update Thu Feb 16 15:54:37 2017 SELATNI Ryad
//

function	pile_face($joueur)
{
  $choice;
  
  echo "$joueur[0], vous choisisser pile ou face?\n$joueur[0] :";
  $choice = readline();
  while ($choice != "pile" && $choice != "face")
    {
      echo "Je n'ai pas compris votre choix?\n$joueur[0] :";
      $choice = readline();
    }
  $joueur[4] = rand(0,1);
  if ($joueur[4] == 1)
    echo "Le resultat est $choice, vous commencer...\n";
    else
      echo "Le resultat est $choice, Callaghan commence...\n";
  return ($joueur);
}