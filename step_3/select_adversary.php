<?php
// select_adversary.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 11:08:34 2017 SELATNI Ryad
// Last update Thu Feb 16 17:04:43 2017 SELATNI Ryad
//

function        choice_Callaghan_class($choice)
{
  $i = 0;
  $class[0]="Mage";
  $class[1]="Chasseur";
  $class[2]="Druide";
  $class[3]="Paladin";
  $class[4]="Prêtre";
  $class[5]="Voleur";
  $class[6]="Chaman";
  $class[7]="Démoniste";
  $class[8]="Guerrier";
  $class[9]="Demoniste";
  $class[10]="Pretre";

  if ($choice == NULL)
    {
      echo "Callaghan comprend votre silence, il choisie sa classe!\n";
      return("random");
    }
  while ($i != 11)
    {
      if ($choice == $class[$i])
	{
	  echo "Callaghan vous affrontera autant que $class[$i]!\n";
	  return ($class[$i]);
	}
      $i++;
    }
  echo "Callaghan ne vous comprend pas ?\n";
  return (-1);
}

function	Callaghan_choice($Callaghan)
{
  $class[0]="Mage";
  $class[1]="Chasseur";
  $class[2]="Druide";
  $class[3]="Paladin";
  $class[4]="Prêtre";
  $class[5]="Voleur";
  $class[6]="Chaman";
  $class[7]="Démoniste";
  $class[8]="Guerrier";
  $Callaghan[1] = $class[rand(0,8)];
  return ($Callaghan);
}

function	select_ennemy($name)
{
  $Callaghan[0] = "Callaghan";
  
  echo "Callaghan vous defi mais il vous laisse choisir sa classe :\n - Mage\n - Chasseur\n - Druide\n - Paladin\n - Prêtre\n - Voleur\n - Chaman\n - Démoniste\n - Guerrier\n$name :";
  $Callaghan[1] = readline();
  while (choice_Callaghan_class($Callaghan[1]) == -1)
    {
      echo "$name : ";
      $Callaghan[1] = readline();
    }
  if ($Callaghan[1] == NULL)
    return (Callaghan_choice($Callaghan));
  return($Callaghan);
}

