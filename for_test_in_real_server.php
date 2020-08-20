<html>
<body>
<form action="index.php" method="get">
File: <input type="text" name="file1"><br>
Action: <input type="text" name="action1"><br>
<input type="submit">
</form>
</body>
</html>
<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
 
 $file1 =  $_GET["file1"]; 
$action1 = $_GET["action1"];

$fd = fopen($file1, 'r') or die("");
$fpp = fopen('positiv.txt', 'w') or die("");
$fpn = fopen('negativ.txt', 'w') or die("");
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
           $pieces = explode(" ", $str);
                 if ($action1=="-") $str_a = (int)$pieces[0]-(int)$pieces[1];
                 if ($action1=="+") $str_a = (int)$pieces[0]+(int)$pieces[1];
                 if ($action1=="*") $str_a = (int)$pieces[0]*(int)$pieces[1];
                 if ($action1=="/") $str_a = (int)$pieces[0]/(int)$pieces[1];
                 if ($str_a<0) fwrite($fpn, $str_a."\r\n");
                 if ($str_a>=0) fwrite($fpp, $str_a."\r\n");         
}
    fclose($fd);
    fclose($fpp);
    fclose($fpn);
?>
