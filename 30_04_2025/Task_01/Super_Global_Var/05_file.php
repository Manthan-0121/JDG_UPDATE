<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Global Function FILE[]</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="file" name="myfile2">
        <br>
        <br>
        <input type="submit" value="Get Details">
    </form>

</body>

</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
    }

// | Error Code | Meaning |
// |------------|---------|
// | `0`        | No error |
// | `1`        | Exceeds `upload_max_filesize` in `php.ini` |
// | `2`        | Exceeds MAX_FILE_SIZE in HTML form |
// | `3`        | Partial upload |
// | `4`        | No file uploaded |
// | `6`        | Missing temp folder |
// | `7`        | Can't write to disk |
?>