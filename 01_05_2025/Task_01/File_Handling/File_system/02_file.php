<?php
// fopen() 
// feof() 
// fread() 
// file() 
// fgets() 
// fgetc() 
// ftell() 
// fwrite() 
// fseek() 
// fputs() 
// fpassthru() 
// fclose() 
// rewind() 
// ftruncate()

$file = fopen("readme.txt","r") or die("File not found!");

// // echo fread($file,filesize("readme.txt"));
// echo fgets($file);
// echo "<br>";
// echo ftell($file);
// echo "<br>";

// echo fgets($file);
// echo "<br>";
// echo ftell($file);
// echo "<br>";


// echo fgets($file);
// echo "<br>";
// echo ftell($file);
// echo "<br>";

// echo fgets($file);
// echo "<br>";
// echo ftell($file);
// echo "<br>";

while(!feof($file)) {
    echo "1  ".fgets($file). "<br>";
}
fclose($file);
echo "<br>";
echo "<br>";
echo "<pre>";
print_r(file("readme.txt"));
echo "</pre>";


// $file2 = fopen("readme.txt","r+") or die("Unable to open file!");
// $file2 = fopen("readme.txt","w+") or die("Unable to open file!");
$file2 = fopen("readme.txt","a+") or die("Unable to open file!");

fwrite($file2, "\nThis is a new line added");

ftruncate($file2, 100);
?>