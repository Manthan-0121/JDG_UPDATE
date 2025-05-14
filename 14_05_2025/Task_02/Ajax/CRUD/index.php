<?php
include "config.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJAX CRUD Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="bg-light">

    <div class="container py-4">
        <h2 class="mb-4">AJAX CRUD Example</h2>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            + Create
        </button>

        <!-- Data Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="dataTable">

            </tbody>
        </table>
    </div>

    <!-- Toast Container (top-right corner) -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Record created successfully!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>


    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="createForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameInput" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailInput" name="email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" name="edtid" id="edtid">
                        <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editNameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editNameInput" name="ename" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmailInput" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmailInput" name="eemail" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        function showToast(message, type) {
            const toastEl = document.getElementById("liveToast");
            const toastBody = toastEl.querySelector(".toast-body");

            toastBody.textContent = message;

            toastEl.className = `toast align-items-center text-white bg-${type} border-0`;

            const toast = new bootstrap.Toast(toastEl, {
                delay: 2000
            });
            toast.show();
        }

        $(document).ready(function() {
            $('#createForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: 'create.php',
                    type: 'post',
                    data: formData,
                    headers: {
                        'Authorization': '<?php echo $token; ?>'
                    },
                    success: function(response) {
                        $('#createModal').modal('hide');
                        fetchRecords();
                        showToast('Record created successfully!', 'success');
                        $('#nameInput').val('');
                        $('#emailInput').val('');
                    }
                });
            });
            fetchRecords();
        });

        function fetchRecords() {
            $.ajax({
                url: 'read.php',
                type: 'post',
                headers: {
                    'Authorization': '<?php echo $token; ?>'
                },
                success: function(response) {
                    $('#dataTable').html(response);
                }
            });
        }

        function deleteRecord(id) {
            $.ajax({
                url: 'delete.php',
                type: 'post',
                data: {
                    id: id
                },
                headers: {
                    'Authorization': '<?php echo $token; ?>'
                },
                success: function(response) {
                    showToast('Record deleted successfully!', 'success');
                    fetchRecords();
                }
            });
        }

        function select_update_record(id) {
            $.ajax({
                url: 'select_update_record.php',
                type: 'post',
                data: {
                    id: id
                },
                headers: {
                    'Authorization': '<?php echo $token; ?>'
                },
                success: function(response) {
                    let res = JSON.parse(response);

                    $('#edtid').val(res.id);
                    $('#editNameInput').val(res.name);
                    $('#editEmailInput').val(res.email);
                    $('#editModal').modal('show');
                }
            });
        }

        $('#editForm').submit(function(e) {
            e.preventDefault();
            var eformData = $('#editForm').serialize();
            $.ajax({
                url: 'update.php',
                type: 'post',
                data: eformData,
                headers: {
                    'Authorization': '<?php echo $token; ?>'
                },
                success: function(response) {
                    showToast('Record updated successfully!', 'success');
                    $('#editModal').modal('hide');
                    fetchRecords();
                }
            });
        });
    </script>
</body>

</html>