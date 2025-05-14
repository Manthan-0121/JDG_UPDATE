<?php
include "config.php";
if ($token == getallheaders()['Authorization']) {
    $sql = "SELECT * FROM tbl_user";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($row["id"])  . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>
                    <button class='btn btn-primary btn-sm' onclick='select_update_record(" . $row["id"] . ")' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button>
                    <button class='btn btn-danger btn-sm' onclick='deleteRecord(" . $row["id"] . ")'>Delete</button>
                </td>
            </tr>";
        }
    } else {
        echo "No records found";
    }
}else {
    echo "Invalid token";
}
