<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>super global REQUEST</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" name="username">
        <input type="submit" value="Submit">
    </form>
</body>

</html>
<?php
setcookie("username", "Manthan", time() + 7);
if (isset($_POST["username"])) {
    echo "Hello, " . $_REQUEST['username'];
}


?>