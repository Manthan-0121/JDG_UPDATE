<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=practice_db", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selsql = "SELECT * FROM tbl_account";
                $stmt = $conn->prepare($selsql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo "<br>";
                $sqno = 1;
                foreach ($result as $res) {
                ?>
                    <tr>
                        <th scope="col"><?php echo $sqno++; ?></th>
                        <td scope="col"><?php echo $res['account_name']; ?></td>
                        <td scope="col"><?php echo $res['account_balance']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="container mt-5 ">
            <h3>Transfer Rs A to B </h3>
            <div>
                <div class="row">
                    <div class="col-2">
                        Enter amount
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control" name="txt_amount" placeholder="Enter Amount" aria-label="Last name">
                    </div>
                    <div class="col-2">
                        <button type="submit" name="btn_transfer" class="btn btn-primary">Transfer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['btn_transfer'])) {
        $amount = $_POST['txt_amount'];
        $sel_balance_A = "SELECT account_balance FROM tbl_account WHERE account_name = 'A'";
        $stmt = $conn->prepare($sel_balance_A);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $balance_A = $result['account_balance'];

        if ($amount > $balance_A) {
            echo "Insufficient funds for transfer";
        } else {
            $sel_balance_B = "SELECT account_balance FROM tbl_account WHERE account_name = 'B'";
            $stmt = $conn->prepare($sel_balance_B);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $balance_B = $result['account_balance'];
            
            $new_balance_A = $balance_A - $amount;
            $new_balance_B = $amount + $balance_B;

            $update_balance_A = "UPDATE tbl_account SET account_balance = $new_balance_A WHERE account_name = 'A'";
            $update_balance_B = "UPDATE tbl_account SET account_balance = $new_balance_B WHERE account_name = 'B'";
            $stmt = $conn->prepare($update_balance_A);
            $stmt->execute();
            $stmt = $conn->prepare($update_balance_B);
            $stmt->execute();
            echo "Transfer successful";
        }
    }
}
?>