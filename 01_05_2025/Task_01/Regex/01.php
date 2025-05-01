<?php
$str = "Visit W3Schools";
$pattern = "/w3schools/i";
echo preg_match($pattern, $str);

echo "<br>";

$sentence = "This is a sample sentence.";
echo "<pre>";
$words = preg_split("/[A-Za-z]+/", $sentence);
echo "<pre>";
print_r($words);


echo preg_match('/\d+/', 'User123', $matches);
echo preg_match_all('/\b\w{4}\b/', 'This has four-letter words', $matches);
$filtered = preg_grep('/^[A-Z]/', ['Apple', 'banana', 'Orange']);

echo "<pre>";
print_r($filtered);
echo "</pre>";

$text = preg_replace('/\d+/', 'X', 'a1 b2 c3'); 
echo $text;
echo "<br>";
echo "<br>";
$text = preg_replace_callback('/\d+/', fn($m) => $m[0] * 2, 'a1 b2'); 
echo $text;

