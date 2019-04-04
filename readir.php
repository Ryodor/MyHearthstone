
function   file_is_good($filename)
{
  if (ord($filename[0]) == 46)
    return (1);
  else if (is_c_or_h($filename) == FALSE)
    return (1);
  else if (is_readable($filename) == FALSE)
    {
      echo "\033[31m Erreur : \033[0m $filename n'est pas accesible\n";//error_code();
      return (1);
    }
  return (0);
}


function        read_files($path)
{
  if (file_is_good($name) == FALSE)
    {
      //error_code();
      echo "There is an error on the file.\n";
      return (0);
    }

  $in_file = file_get_contents("$name");
  echo $in_file;
}

function  scan_dir($Directory)
{
  $MyDirectory = opendir($Directory) or die ('Erreur');
  while($Entry = readdir($MyDirectory))
    {
      if($Entry != '.' && $Entry != '..' && file_is_good($Entry) != 1)
	call_them_all(realpath($Entry));
    }
  closedir($MyDirectory);
}
