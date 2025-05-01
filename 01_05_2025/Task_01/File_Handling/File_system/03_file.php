<?php

// is_dir() 
// is_file() 
// is_readable() 
// is_writable() 
// is_writeable() 
// is_executable()

if(is_file("readme.txt")) {
    echo "File exists.";
}else{
    echo "File does not exist.";
}
echo "<br>";
if(is_dir("new_folder")) {
    echo "Directory exists.";
}else{
    echo "Directory does not exist.";
}
echo "<br>";
if(is_writable("readme2.txt")) {
    echo "Yes is writable.";
}else{
    echo "No is not writable.";
}
echo "<br>";
if(is_readable("readme.txt")) {
    echo "Yes is writable.";
}else{
    echo "No is not writable.";
}

echo "<br>";
if(is_executable("readme.txt")) {
    echo "Yes is executable.";
}else{
    echo "No is not executable. ";
}