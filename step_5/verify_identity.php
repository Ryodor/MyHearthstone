<?php
// verify_identity.php for  in /home/ryad/Project/ratrapage/php/selatn_r/MyHearthstone
// 
// Made by SELATNI Ryad
// Login   <selatn_r@etna-alternance.net>
// 
// Started on  Thu Feb 16 09:37:11 2017 SELATNI Ryad
// Last update Thu Feb 16 10:59:24 2017 SELATNI Ryad
//

function        is_class($choice)
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

  while ($i != 11)
    {
      if ($choice == $class[$i])
	return ($class[$i]);
      $i++;
    }
  return (-1);
}

function        enough_arg ($ac, $av)
{
  if ($ac != 3 || $av[1] == NULL || $av[2] == NULL)
    return (error_sentence(0));
  else if (is_numeric($av[1]) == TRUE || strlen($av[1]) < 3 || strlen($av[1]) > 16)
    return (error_sentence(1));
  else if (is_class($av[2]) == -1)
    return (error_sentence(2));
  else
    return (is_class($av[2]));
}
