<?php

$table = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $txt_search = htmlspecialchars($_POST["search"]);
    $API_KEY = "99b2aeebe58a40c188c6160570c6b431";
    $url = "https://newsapi.org/v2/everything?q=$txt_search&apiKey=$API_KEY";
    // echo $url;

    $options = [
        'http' => [
            'method' => "GET",
            'header' => "User-Agent: MyNewsApp/1.0 (2almire@chefalicious.com)\r\n"
        ]
    ];

    $data = file_get_contents($url, false, stream_context_create($options));
    $data = json_decode($data, true);

    $table = "
        <table>
            <thead>
                <tr>
                    <th>Source</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Url</th>
                    <th  style='width: 100px;'>Url To Image</th>
                    <th>Published At</th>
                </tr>
            </thead>
            <tbody>
    ";
    $table_show = true;
    foreach ($data["articles"] as $value) {
        $table .= "
            <tr>
                <td>" . $value["source"]["name"] . "</td>
                <td>" . $value["title"] . "</td>
                <td>" . $value["description"] . "</td>
                <td>" . $value["url"] . "</td>
                <td>" . $value["urlToImage"] . "</td>
                <td>" . $value["publishedAt"] . "</td>
            </tr>
        ";
    }
    $table .= "
            </tbody>
        </table>
    ";
}
?>
<html>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            Enter any words: <input type="text" name="search">
        </div>
        <div>
            <input type="submit" value="Search">
        </div>
    </form>
        <?php
    echo $table;
    // if (isset($table))
    ?>
</body>

</html>