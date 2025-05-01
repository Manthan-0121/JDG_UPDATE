<?php
// readfile() 
// unlink() 
// file_exists() 
// filesize() 
// copy() 
// filetype() 
// rename() 
// realpath() 
// mkdir() 
// pathinfo() 
// rmdir() 
// dirname() 
// delete() 
// basename()
if (!file_exists("new_folder") && !is_dir("new_folder")) {
    mkdir("new_folder");
}
$file = "readme.txt";
if (file_exists($file)) {
    $size = filesize($file);
    echo "File size: $size bytes";
    $type = filetype($file);
    echo "<br>";
    echo filetype($file);
}
echo "<pre>";
print_r(pathinfo($file));
echo "</pre>";
$path = realpath($file);
echo "<pre>";
print_r(pathinfo($path, PATHINFO_DIRNAME));
echo "<br>";
print_r(pathinfo($path, PATHINFO_EXTENSION));
echo "<br>";
print_r(pathinfo($path, PATHINFO_BASENAME));
echo "<br>";
print_r(pathinfo($path, PATHINFO_BASENAME));
echo "</pre>";
