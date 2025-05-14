<?php
include "./includes/header.php";
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create a new Business Category</h4>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="txt_business_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control">
                                        <option selected>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include "./includes/footer.php";
?>

<script>
    $(document).ready(function() {
        $("#txt_business_name").on("keyup", function() {
            var name = $(this).val();

            $.ajax({
                url: "chk_business_category.php",
                method: "POST",
                data: {
                    name: name
                },
                success: function(data) {
                    $("#txt_business_name").val(data);
                }
            })
        });
    })
</script>