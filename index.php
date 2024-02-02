<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Bootstrap Modal CURD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="formdata">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="adduser">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="completename">Name</label>
                                <input type="text" name="name" class="form-control" id="completename" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="completeemail">Email</label>
                                <input type="email" name="email" class="form-control" id="completeemail" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="completeaddress">Mobile</label>
                                <input type="text" name="mobile" class="form-control" id="completemobile" placeholder="Enter your mobile">
                            </div>
                            <div class="form-group">
                                <label for="completeaddress">Address</label>
                                <input type="text" name="address" class="form-control" id="completeaddress" placeholder="Enter your address">
                            </div>
                            <div class="form-group">
                                <label for="completepassword">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="submitdata" class="btn btn-dark">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>

    <div class="container my-3">
        <h1 class="text_center">PHP CURD Operations Using Boostrap Modal</h1>
        <button id="insertdata" class="btn btn-dark">
            Add new users
        </button>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="updateformdata">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateuser">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="hidden" value="">
                                <label for="completename">Name</label>
                                <input type="text" name="name" value="" class="form-control" id="u_name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="u_mail">Email</label>
                                <input type="email" name="email" value="" class="form-control" id="u_email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="completeaddress">Mobile</label>
                                <input type="text" name="mobile" value="" class="form-control" id="u_mobile" placeholder="Enter your mobile">
                            </div>
                            <div class="form-group">
                                <label for="completeaddress">Address</label>
                                <input type="text" name="address" value="" class="form-control" id="u_address" placeholder="Enter your address">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="updatesubmitdata" class="btn btn-dark">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `curd`";
                $query = mysqli_query($conn, $sql);
                $i = 1;
                while ($data = mysqli_fetch_assoc($query)) {

                ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['mobile']; ?></td>
                        <td><button id="update_id" data-id=<?php echo $data['id'] ?> class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger delete" data-del="<?php echo $data['id'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("click", "#insertdata", function() {
                $('#completeModal').modal('show');
            });
            $(document).on("click", "#submitdata", function(e) {
                e.preventDefault();
                var formData = new FormData(formdata);
                // alert(formData);
                $.ajax({
                    url: 'insert.php',
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(res) {
                        alert(res)
                        $('form').trigger('reset');
                    },
                    error: function(res) {
                        alert(res);
                    },
                });
            });
        });
    </script>
    <script>
        $('document').ready(function() {
            $(document).on("click", "#update_id", function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: 'update.php',
                    method: "GET",
                    data: {
                        "id": id
                    },
                    dataType: "json",
                    success: function(res) {
                        $("#updateModal").modal('show');
                        $("#hidden").val(res.id);
                        $("#u_name").val(res.name);
                        $("#u_email").val(res.email);
                        $("#u_mobile").val(res.mobile);
                        $("#u_address").val(res.address);
                    },
                    error: function(res) {
                        alert(res);
                    }
                })
            });
        })
        $(document).ready(function() {
            $(document).on('click', '#updatesubmitdata', function(e) {
                e.preventDefault();
                var formdata = new FormData(updateformdata);

                $.ajax({
                    url: 'edit.php',
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formdata,
                    success: function(res) {
                        alert(res);
                        if (res == 1) {
                            location.reload();
                        } else {
                            alert("Error");
                        }
                    },
                    error: function(res) {
                        alert(res);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).on("click", ".delete", function() {
            var mydel = $(this).data("del");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                $.ajax({
                    url: 'delete.php',
                    method: 'POST',
                    data: {
                        id: mydel
                    },
                    success: function(res) {
                        // alert(res);
                        if (res == 1) {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        } else {
                            alert("DATA HAS NOT BEEN DELETED");
                        }
                    }
                });
            });
        })
    </script>
</body>
</body>

</html>
