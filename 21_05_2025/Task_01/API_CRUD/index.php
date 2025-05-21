<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>API CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>User Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add User</button>
        </div>
        <div class="alert alert-success d-none" role="alert" id="successAlert">
            <span class="success-message"></span>
        </div>

        <table class="table table-bordered table-hover table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTable">
                <!-- Dynamic Rows Here -->
            </tbody>
        </table>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="addUserForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger d-none" id="errorAlert" role="alert">
                        <span class="error-message"></span>
                    </div>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" required />
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnSave">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="editUserForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="EuserId" />
                    <div class="mb-3">
                        <label for="EuserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="EuserName" required />
                    </div>
                    <div class="mb-3">
                        <label for="EuserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="EuserEmail" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnUpdate" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- View User Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="userDetails"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const BASE_URL = "http://127.0.0.1/manthan/JDG_UPDATE/20_05_2025/Task_01/API_Integration/API_CRUD/api/api.php";

        function showAlert(message) {
            $('#errorAlert').removeClass('d-none').find('.error-message').text(message);
            setTimeout(() => $('#errorAlert').addClass('d-none'), 3000);
        }

        function showSuccessAlert(message) {
            $('#successAlert').removeClass('d-none').find('.success-message').text(message);
            setTimeout(() => $('#successAlert').addClass('d-none'), 3000);
        }

        function fatchUser() {
            $.ajax({
                url: BASE_URL,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    let html = "";
                    response.forEach((user, index) => {
                        html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>
                                <button class="btn btn-info btn-sm viewBtn" data-id="${user.id}">View</button>
                                <button class="btn btn-warning btn-sm editBtn" data-id="${user.id}" data-name="${user.name}" data-email="${user.email}">Edit</button>
                                <button class="btn btn-danger btn-sm deleteBtn" data-id="${user.id}">Delete</button>
                            </td>
                        </tr>`;
                    });
                    $('#userTable').html(html);
                }
            });
        }

        $(document).ready(function() {
            fatchUser();

            // Add User
            $('#addUserForm').on('submit', function(e) {
                e.preventDefault();
                const name = $('#userName').val().trim();
                const email = $('#userEmail').val().trim();

                if (!name || !email) {
                    showAlert("Please fill all fields");
                    return;
                }

                $.ajax({
                    url: BASE_URL,
                    type: "POST",
                    data: {
                        name,
                        email
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 1) {
                            $('#addModal').modal('hide');
                            $('#addUserForm')[0].reset();
                            fatchUser();
                            showSuccessAlert(response.message);
                        } else {
                            showAlert(response.message);
                        }
                    }
                });
            });

            // Open Edit Modal & Fill Data
            $(document).on('click', '.editBtn', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const email = $(this).data('email');

                $('#EuserId').val(id);
                $('#EuserName').val(name);
                $('#EuserEmail').val(email);

                $('#editModal').modal('show');
            });

            // Update User
            $('#editUserForm').on('submit', function(e) {
                e.preventDefault();

                const id = $('#EuserId').val();
                const name = $('#EuserName').val().trim();
                const email = $('#EuserEmail').val().trim();

                if (!name || !email) {
                    showAlert("Please fill all fields");
                    return;
                }

                $.ajax({
                    url: `${BASE_URL}?id=${id}`,
                    type: "PUT",
                    contentType: "application/json",
                    data: JSON.stringify({
                        name,
                        email
                    }),
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 1) {
                            $('#editModal').modal('hide');
                            fatchUser();
                            showSuccessAlert(response.message);
                        } else {
                            showAlert(response.message);
                        }
                    }
                });
            });

            // View User
            $(document).on('click', '.viewBtn', function() {
                const name = $(this).closest('tr').find('td:nth-child(2)').text();
                const email = $(this).closest('tr').find('td:nth-child(3)').text();

                $('#userDetails').html(`
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Email:</strong> ${email}</p>
            `);
                $('#viewModal').modal('show');
            });

            // Delete User
            $(document).on('click', '.deleteBtn', function() {
                const id = $(this).data('id');

                if (confirm("Are you sure you want to delete this user?")) {
                    $.ajax({
                        url: BASE_URL,
                        type: "DELETE",
                        contentType: "application/json",
                        data: JSON.stringify({
                            id
                        }),
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 1) {
                                fatchUser();
                                showSuccessAlert(response.message);
                            } else {
                                showAlert(response.message);
                            }
                        }
                    });
                }
            });
        });
    </script>