<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
</head>

<body>
    <h1>Users</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['name']; ?> - <?= $user['email']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>