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
$file1 =  $_GET["file1"]; 
$action1 = $_GET["action1"];
//$file1=readline("file=");  
//$action1=readline("action (+  -  *  / )=");      
//echo "your input is $file1\n";
//echo "your input is $action1\n";
$fd = fopen($file1, 'r') or die("не удалось открыть файл");
$fpp = fopen('positiv.txt', 'w') or die("не удалось открыть файл");
$fpn = fopen('negativ.txt', 'w') or die("не удалось открыть файл");
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
           $pieces = explode(" ", $str);
                 if ($action1=="-") $str_a = (int)$pieces[0]-(int)$pieces[1];
                 if ($action1=="+") $str_a = (int)$pieces[0]-(int)$pieces[1];
                 if ($action1=="*") $str_a = (int)$pieces[0]-(int)$pieces[1];
                 if ($action1=="/") $str_a = (int)$pieces[0]-(int)$pieces[1];
                 if ($str_a<0) fwrite($fpn, $str_a."\r\n");
                 if ($str_a>=0) fwrite($fpp, $str_a."\r\n");         
}
    fclose($fd);
    fclose($fpp);
    fclose($fpn);
?>
