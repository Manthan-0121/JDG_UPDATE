<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01</title>
</head>

<body>
    <form action="">
        City name
        <input type="text" id="txt_name" name="name" onkeyup="showHint(this.value)">
        <hr>
        <h3 id="suggestions"></h3>
    </form>

    <script>
        function showHint(str) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("suggestions").innerHTML =
                    this.responseText;
            }
            xhttp.open("GET", "search.php?q=" + str);
            xhttp.send();
        }
    </script>
</body>

</html>