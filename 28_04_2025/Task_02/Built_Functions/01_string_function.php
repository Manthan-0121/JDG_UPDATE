<?php
// strlen() Function
$str = "Hello World!";
echo strlen($str);
echo "<br>";

// strrev() Function
echo strrev($str);
echo "<br>";

// trim(), ltrim(), rtrim(), and chop() Functions
echo $str . "<br>";

echo chop($str, "\0") . "<br>";

echo trim($str, "\n") . "<br>";

echo rtrim($str, "\r") . "<br>";

echo ltrim($str, "\x0B") . "<br>";

// strtoupper() and strtolower() Function
echo strtoupper($str) . "<br>";
echo strtolower($str) . "<br>";

// str_split() Function
print_r(str_split($str));
echo "<br>";
print_r(str_split($str, 3));
echo "<br>";

// str_word_count() Function

$str1 = "Hello, World! This is a test.";
echo str_word_count($str1);
echo "<br>";

// strpos() Function
// strpos(original_str, search_str, start_pos);
$str2 = "Hello, World! This is a test.";
echo strpos($str2, "World");
echo "<br>";

// str_replace() Function

$subjectVal = "Computer Science in GeeksforGeeks is fun";
$resStr = str_replace('Science', 'algorithms', $subjectVal);
print_r($resStr);

// ucwords() Function
echo '<br>';
$str = "Geeks for geeks is fun";
$resStr = ucwords($str);
print_r($resStr);

// is_string() Function
echo '<br>';
if (is_string($str)) {
    echo "String";
} else {
    echo "Not String";
}
echo '<br>';
echo strtolower("WORLD") . '<br>';

echo ucfirst("geeks for geeks is fun") . "<br>";

echo trim(" text ") . "<br>";

echo ltrim(" text ") . "<br>";

echo rtrim(" text ") . "<br>";

echo str_ireplace("A", "o", "Banana") . "<br>";

echo str_replace("A", "o", "banana") . "<br>";

echo substr("Hello", 1, 3) . "<br>";

echo strstr("test@example.com", "@") . "<br>";

echo stristr("Hello", "L")  . "<br>";

echo strpos("Hello", "e") . "<br>";

echo stripos("Hello", "L") . "<br>";

echo strrpos("Hello", "l") . "<br>";

echo strripos("Hello", "L") . "<br>";

print_r(explode(",", "a,b,c"));
echo "<br>";

printf(implode("-", [1,2,3]));
echo "<br>";

print_r(str_split("PHP"));
echo "<br>";

print_r(preg_split("/\s+/", "a b c"));
echo "<br>";

//String Comparison
echo strcmp("a", "b")."<br>";

echo strcasecmp("A", "a") ."<br>";

echo strnatcmp("img2", "img10") ."<br>";

echo similar_text("catat", "hata")."<br>";


// String Encoding and Hashing
echo md5("text") ."<br>";

echo sha1("text") ."<br>";

echo base64_encode("PHP")."<br>";

echo base64_decode("UEhQ") ."<br>";

// echo htmlentities("<div>") ."<br>";
// echo html_entity_decode("&lt;div&gt;") ."<br>";
echo htmlspecialchars("&") ."<br>";

// Advanced String Manipulation
echo sprintf("%s costs $%d", "Book", 10) ."<br>";

echo str_repeat("-", 3) ."<br>";

echo str_pad("PHP", 5, "*") ."<br>";

echo str_shuffle("ABC") ."<br>";

echo str_word_count("Hello world") ."<br>";

// Multibyte String Functions (UTF-8 Support)

echo mb_strlen("મંથન")."<br>";

echo mb_substr("મંથન",2, 2)."<br>";

echo mb_strtoupper("straße") ."<br>";

echo mb_strtolower("ÄÖÜ") ."<br>";