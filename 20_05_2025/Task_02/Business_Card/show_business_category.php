<?php
include("./includes/header.php");

?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Business Category</h4>
                        </div>
                        <?php
                        if (isset($_SESSION['success'])) {
                        ?>
                            <div class="show-tost alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <?php
                                    isset($_SESSION['success']) ? print_r($_SESSION['success']) : '';
                                    unset($_SESSION['success']);
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dttable" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sel_category = "SELECT * FROM tbl_business_category";
                                        $stmt = $conn->prepare($sel_category);
                                        $stmt->execute();
                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        $sqn = 1;

                                        foreach ($results as $row) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $status = $row['status'];
                                            $created = date("d/m/Y", strtotime($row['created_at']));
                                        ?>
                                            <tr>
                                                <td><?php echo $sqn++; ?></td>
                                                <td><?php echo htmlspecialchars($name); ?></td>
                                                <td><?php
                                                    if ($status == 1) {
                                                        echo "<span class=\"badge badge-success\">Active</span>";
                                                    } else {
                                                        echo "<span class=\"badge badge-danger\">Inactive</span>";
                                                    }
                                                    ?></td>
                                                <td><?php echo htmlspecialchars($created); ?></td>
                                                <td><a href="edit_business_category.php?id=<?php echo $id; ?>" class="btn btn-sm btn-primary"><i data-feather="edit"></i></a></td>
                                                <td><a href="delete_business_category.php?id=<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i data-feather="trash-2"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include("./includes/footer.php");
?>
