<?php
include('./includes/header.php');
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Show Business Cards</h4>
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
                                            <?php
                                                if ($_SESSION['role'] == '1') {
                                                    echo '<th>User Name</th>';
                                                }
                                            ?>
                                            <th>Status</th>
                                            <th>Logo</th>
                                            <th>Business Name</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $business_card_select_sql = "SELECT binfo.id AS bid, binfo.name AS bname, binfo.logo AS blogo, binfo.status AS bstatus, binfo.link_token AS btoken, bc.name AS bcategory";
                                        if($_SESSION['role'] == '1'){
                                            $business_card_select_sql .= ", tu.first_name AS bfname, tu.last_name AS bkname";
                                        }
                                        $business_card_select_sql .= " FROM tbl_business_info AS binfo INNER JOIN tbl_business_category AS bc ON binfo.business_category_id = bc.id";
                                        if($_SESSION['role'] == '1'){
                                            $business_card_select_sql .= " INNER JOIN tbl_user AS tu ON binfo.user_id = tu.id";
                                        }
                                        if($_SESSION['role'] == '2'){
                                            $business_card_select_sql .= " WHERE binfo.user_id = :user_id";
                                        }
                                        
                                        $stmt = $conn->prepare($business_card_select_sql);
                                        if($_SESSION['role'] == '2'){
                                            $stmt->bindParam(':user_id', $_SESSION['uid'], PDO::PARAM_INT);
                                        }
                                        $stmt->execute();
                                        $business_cards = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        if ($business_cards) {
                                            $i = 1;
                                            foreach ($business_cards as $card) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <?php
                                                    if ($_SESSION['role'] == '1') {
                                                        echo '<td>' . htmlspecialchars($card['bfname']) . ' ' . htmlspecialchars($card['bkname']) . '</td>';
                                                    }
                                                    ?>
                                                    <td>
                                                        <?php
                                                        if ($card['bstatus'] == 1) {
                                                            echo '<span class="badge badge-success">Active</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Inactive</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($card['blogo'])) {
                                                            echo '<img src="' . $card['blogo'] . '" alt="' . htmlspecialchars($card['bname']) . '" width="50" height="50">';
                                                        } else {
                                                            echo 'No Logo';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo htmlspecialchars($card['bname']); ?></td>
                                                    <td><?php echo htmlspecialchars($card['bcategory']); ?></td>
                                                    <td><a href="./edit_card.php?token=<?php echo $card['btoken']; ?>" class="btn btn-primary"><i data-feather="edit"></i></a></td>
                                                    <td><a href="./delete_card.php?token=<?php echo $card['btoken']; ?>" class="btn btn-danger"><i data-feather="trash-2"></i></a></td>
                                                    <td><a href="qr_generate.php?token=<?php echo $card['btoken']; ?>" target="_blank" class="btn btn-icon icon-left btn-info"><i class="fa fa-download me-2"></i> QR</a></td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="8" class="text-center">No Business Cards Found</td></tr>';
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
include('./includes/footer.php');
?>