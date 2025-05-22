<?php
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    echo "<script>alert('Welcome back, " . htmlspecialchars(base64_decode($_COOKIE['email'])) . "!');</script>";
} else {
    echo "<script>alert('Please log in to continue.');</script>";
    header("Location: index.php");
}
?>

your email is : <?php if(isset($_COOKIE['email'])) { echo htmlspecialchars(base64_decode($_COOKIE['email'])); }else { echo "Unknown"; } ?>
