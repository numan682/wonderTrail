<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add any custom styles -->
    <style>
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .edit-btn,
        .delete-btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Users List</h2> <a href="add_user.php">Add User</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="users-list">
                <!-- Users will be dynamically loaded here -->
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JavaScript (jQuery is required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load the users list on page load
            loadUsersList();

            // Edit user
            $(document).on('click', '.edit-btn', function() {
                var userId = $(this).data('id');
                editUser(userId);
            });

            // Delete user
            $(document).on('click', '.delete-btn', function() {
                var userId = $(this).data('id');
                deleteUser(userId);
            });
        });

        function loadUsersList() {
            $.ajax({
                url: 'get_users.php',
                type: 'GET',
                success: function(response) {
                    $('#users-list').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function editUser(userId) {
            // Open the edit user form in a modal or redirect to a separate page
            // You can implement this based on your preference
            // Here, let's open a modal to edit user
            $('#editUserModal').modal('show');

            // Load the user data for editing
            $.ajax({
                url: 'get_user.php',
                type: 'GET',
                data: {
                    userId: userId
                },
                success: function(response) {
                    // Populate the modal form with user data for editing
                    $('#editUserForm').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: 'delete_user.php',
                    type: 'POST',
                    data: {
                        userId: userId
                    },
                    success: function(response) {
                        // Refresh the users list after successful deletion
                        loadUsersList();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        }
    </script>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <!-- User data will be dynamically loaded here -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
