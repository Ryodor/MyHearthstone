<?php

function alea_deck($deck)
{
  $i = 0;
  while (isset($deck[$i]))
    {
      $number[$i] = false;
      $i = $i + 1;
    }
  $max = $i;
  $i = 0;
  while ($i < $max)
    {
      $new_rand = rand(0, $max - 1);
      if ($number[$new_rand] == false)
	{
	  $number[$new_rand] == true;
	  $new_deck[$i] = $deck[$new_rand];
	  $i = $i + 1;
	}
    }
  return $new_deck;
}

function constr_user_deck($tab, $class)
{
  $cards = 0;
  $exist = false;
  while ($cards < 10)
    {
      $exist = false;
      while (!$exist)
	{
	  echo "Voici les cartes disponibles pour vous : (M = Mana, V = Vie, A = Attaque)\n";
	  display_cards($tab, $class);
	  $y = 0;
	  $readed = readline();
	  $pattern = '/^' . $readed . '$/';
	  while (isset($tab[$y]) && !$exist)
	    {
	      $str = $tab[$y]["nom"];
	      if (preg_match($pattern, $str) == 1 && $tab[$y]["classe_joueur"] == strtolower($class))
		{
		  $exist = true;
		  $deck_user[$cards] = $tab[$y];
		  $cards = $cards + 1;
		  echo "Votre carte " . $tab[$y]["nom"] . " a ete ajoutee, plus que : " . (10 - $cards) . "\n\n\n";
		}
	      $y = $y + 1;
	    }
	  if ($exist != true)
	    echo "Ceci ne fait pas partie des cartes disponibles pour votre classe\n\n\n";
	}
    }
  return($deck_user);
}

function display_cards($tab, $class)
{
  $i = 0;
  while (isset($tab[$i]))
    {
      if (strtolower($class) == $tab[$i]["classe_joueur"])
	{
	  echo ($tab[$i]["nom"] . ", M : " . $tab[$i]["points"]["mana"]);
	  if ($tab[$i]["type"] != "sort")
	    echo (", A : " . $tab[$i]["points"]["attaque"] . ", V : " . $tab[$i]["points"]["vie"]);
	  echo "\n";
	}
      $i = $i + 1;
    }
}

function  scan_dir()
{
  $tab;
  $i = 0;
  $Directory = "../cards";
  $MyDirectory = opendir($Directory) or die ('Erreur');
  while($Entry = readdir($MyDirectory))
    {
      if ($Entry != ".." and $Entry != ".")
	{
	  $tab[$i] = check_cards($Entry);
	  $i = $i + 1;
	}
    }
  closedir($MyDirectory);
  return $tab;
}

function check_cards($file)
{
  $file = "../cards/" . $file;
  $test = fread(fopen($file, "r"), 800);
  preg_match('/"nom": "((\w*[\']*\s*)*)",/', $test, $name);
  preg_match('/"attaque": "(\d*)"/', $test, $attaque);
  preg_match('/"vie": "(\d*)"/', $test, $vie);
  preg_match('/"mana": "(\d*)"/', $test, $mana);
  preg_match('/"type": "(\w*\s*)"/', $test, $type);
  preg_match('/"classe_joueur": "(\w*\s*)"/', $test, $classe_joueur);
  preg_match('/"description": "((\S*\s*)*)"/', $test, $description);
  $tab = [
	  "nom" => $name[1],
	  "points" => [
		       "attaque" => $attaque[1],
		       "vie" => $vie[1],
		       "mana" => $mana[1]
		       ],
	  "type" => $type[1],
	  "classe_joueur" => $classe_joueur[1],
	  "description" => $description[1]
	  ];
  return $tab;
}
?>