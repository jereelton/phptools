<?php

$iso88591 = "ISO-8859-1   : ConsideraÃ§Ãµes e InstalaÃ§Ãµes Ãtimas do TrÃ¢nsito";
$ascii    = "ASCII        : Fun&ccedil;&otilde;es e Par&acirc;metros !";
$utf8     = "UTF-8        : Considerações e Instalações Ótimas do Trânsito";
$win1252  = "WINDOWS-1252 : ConsideraÃ§Ãµes e InstalaÃ§Ãµes Ã“timas do TrÃ¢nsito";

echo $iso88591."<br />";
echo $ascii   ."<br />";
echo $utf8    ."<br />";
echo $win1252 ."<br />";

echo "<hr />";

$iso88591 = mb_convert_encoding($iso88591, 'ISO-8859-1');
echo $iso88591 ." => ". mb_detect_encoding($iso88591) . "<br />";

$ascii = mb_convert_encoding($ascii, 'ASCII');
echo $ascii ." => ". mb_detect_encoding($ascii) . "<br />";

$utf8 = mb_convert_encoding($utf8, 'UTF-8');
echo $utf8 ." => ". mb_detect_encoding($utf8) . "<br />";

$win1252 = mb_convert_encoding($win1252, 'WINDOWS-1252');
echo $win1252 ." => ". mb_detect_encoding($win1252) . "<br />";

?>

