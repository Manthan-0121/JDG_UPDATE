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
                                            <th>Action</th>
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
                                            $created = $row['created_at'];
                                        ?>
                                            <tr>
                                                <td><?php echo $sqn++; ?></td>
                                                <td><?php echo htmlspecialchars($name); ?></td>
                                                <td><?php echo htmlspecialchars($status); ?></td>
                                                <td><?php echo htmlspecialchars($created); ?></td>
                                                <td><a href="#" class="btn btn-primary">Edit</a></td>
                                                <td><a href="#" class="btn btn-danger">Delete</a></td>
                                                <td><a href="#" class="btn btn-info">Enable</a></td>
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