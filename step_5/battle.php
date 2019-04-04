<?php

function battle($player, $player_deck, $bot, $bot_deck)
{
  $turn = 1;
  $win = 0;
  $main = [$player_deck[0], $player_deck[1], $player_deck[2]];
  $bot_main = [$bot_deck[0], $bot_deck[1], $bot_deck[2]];
  $piece = $player[4];
  $incre_turn = $player[4];
  $main = [$player_deck[0], $player_deck[1], $player_deck[2]];
  while ($win == 0)
    {
      if ($piece == 1)
	turn_joueur($main, $player_deck, $player, $bot, $turn);
      else
	turn_bot($bot_deck, $bot_main, $player, $bot, $turn);
      $piece = ($piece + 1) % 2;
      if ($piece == $incre_turn)
	$turn = $turn + 1;
      if ($player[2] <= 0)
	$win = 1;
      else if ($bot[2] <= 0)
	$win = 2;
    }
    if ($win == 1)
      echo "Votre défaite est cuisante, " . $player[1] . ".\n";
    else
      echo "Vous avez gagné... pour cette fois.\n";
}

function turn_bot(&$bot_deck, &$bot_main, &$bot, &$player, $turn)
{
  mana($bot, $turn);
  $i = 0;
  if ($turn > 1 && $turn < 8)
    {
      while(isset($bot_main[$i]))
	$i = $i + 1;
      $bot_main[$i] = $bot_deck[$i + 1];
    }
  else if ($turn >= 8)
    $bot[2] = $bot[2] - ($turn - 7);
  if ($bot[2] > 0)
    {
      $played = false;
      $y = 0;
      while (isset($bot_main[$y]) && $played == false)
	{
	  if($bot_main[$y]["points"]["mana"] <= $bot[3])
	    {
	      $played == true;
	      if ($bot_main[$y]["points"]["attaque"] == "")
		$lp_del = 0;
	      else
		$lp_del = $bot_main[$y]["points"]["attaque"];
	      $player[2] = $player[2] - $lp_del;
	      echo ($lp_del . " degats infliges par l'adversaire\n");
	      $bot_main = card_use($bot_main, $y);
	    }
	  $y++;
	}
    }
}

function turn_joueur(&$player_main, &$player_deck, &$player, &$bot, $turn)
{
  mana($player, $turn);
  $i = 0;
  if ($turn > 1 && $turn < 8)
    {
      while(isset($player_main[$i]))
	$i = $i + 1;
      $player_main[$i] = $player_deck[$i + 1];
    }
  else if ($turn >= 8)
    $player[2] = $player[2] - ($turn - 7);
  if ($player[2] > 0)
    {
      echo "C'est votre tour, tapez le numero associer a votre carte pour la poser, tapez 0 pour passer votre tour\n";
      $max = display_main($player_main);
      $choose = 42;
      while (preg_match('/[0-9]{1,2}/', $choose) != 1 || $choose > $max)
	{
	  $choose = readline();
	}
      if ($choose > 0)
	{
	  $choose = $choose - 1;
	  if ($player_main[$choose]["points"]["attaque"] == "")
	    $lp_del = 0;
	  else
	    $lp_del= $player_main[$choose]["points"]["attaque"];
	  $bot[2] = $bot[2] - $lp_del;
	  echo ($lp_del . " degats infliges a l'adversaire\n");
	  $player_main = card_use($player_main, $choose);
	}
    }
}

function display_main($tab)
{
  $i = 0;
  while (isset($tab[$i]))
    {
      $to_add = "";
      if ($tab[$i]["type"] != "sort")
	$to_add = ", A : " . $tab[$i]["points"]["attaque"] . ", V : " . $tab[$i]["points"]["vie"];
      echo (($i + 1) . ". " . $tab[$i]["nom"] . ", M : " . $tab[$i]["points"]["mana"] . $to_add . "\n");
      $i = $i + 1;
    }
  return ($i);
}

function card_use($main, $card_number)
{
  $i = 0;
  while ($i < $card_number)
    {
      $tab[$i] = $main[$i];
      $i = $i + 1;
    }
  $i = $i + 1;
  while (isset($main[$i]))
    {
      $tab[$i - 1] = $main[$i];
      $i = $i + 1;
    }
  return $tab;
}

function mana(&$objet, $turn)
{
  if ($turn < 5)
    $objet[3] = $turn;
  else
    $objet[3] = 5;
}