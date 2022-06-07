<?php

$fh = fopen('/home/thesmith/books.txt', 'r');
// While the end-of-file hasn't been reached, retrieve the next line
$strr="";
while (!feof($fh)){
    $strr.= "\"".fgets($fh)."\",";
}
echo $strr;
fclose($fh);