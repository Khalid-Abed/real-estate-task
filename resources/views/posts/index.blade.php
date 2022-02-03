<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Datatables Tutorial - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="card ">
        <h4>
            Post Data
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#AddStudentModal">Add Post</button>
        </h4>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>Contact number</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

{{-- Add Modal --}}

<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddStudentModalLabel">Add Post Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" required class="title form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Contact Number</label>
                    <input type="text" required class="contact_number form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea type="text" rows="4" required class="description form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" required accept="image/*" class="image form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_post">Save</button>
            </div>

        </div>
    </div>
</div>


{{-- Edit Modal --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update Post Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="stud_id" />

                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" id="title" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Contact Number</label>
                    <input type="text" id="contact_number" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea type="text" rows="5" id="description" required class="form-control"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_student">Update</button>
            </div>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
$(function () {

    // initalize datatable
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('posts.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'contact_number', name: 'contact_number'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });



    // Add new Post
    $(document).on('click', '.add_post', function (e) {
        e.preventDefault();
        $(this).text('Sending..');
        var data = {
            'title': $('.title').val(),
            'contact_number': $('.contact_number').val(),
            'description': $('.description').val(),
            'image': $('.image').val(),
        }

        console.log(data)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "POST",
            url: "/user/posts",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status == 400) {
                    console.log('error ');
                    $('#save_msgList').html("");
                    $('#save_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('.add_post').text('Save');
                } else {
                    console.log('true');
                    $('#save_msgList').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#AddStudentModal').find('input').val('');
                    $('.add_post').text('Save');
                    $('#AddStudentModal').modal('hide');
                }
            }
        });

    });




    // Edit Post
    $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var post_id = $(this).attr('data-id');
        console.log(post_id)
        $('#editModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/user/posts/"+post_id+"/edit",
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editModal').modal('hide');
                } else {
                    // console.log(response.student.name);
                    $('#title').val(response.post.title);
                    $('#contact_number').val(response.post.contact_number);
                    $('#description').val(response.post.description);
                    $('#stud_id').val(post_id);
                }
            }
        });
        $('.btn-close').find('input').val('');

    });





    // Update Post
    $(document).on('click', '.update_student', function (e) {
        e.preventDefault();
        $(this).text('Updating..');
        var id = $('#stud_id').val();

        var data = {
            'title': $('#title').val(),
            'contact_number': $('#contact_number').val(),
            'description': $('#description').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: "/user/posts/"+id,
            data: data,
            dataType: "json",
            success: function (response) {
                // console.log(response);
                if (response.status == 400) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value +
                            '</li>');
                    });
                    $('.update_student').text('Update');
                } else {
                    $('#update_msgList').html("");

                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editModal').find('input').val('');
                    $('.update_student').text('Update');
                    $('#editModal').modal('hide');
                    // fetchstudent();
                }
            }
        });

    });




    // Show Modal For Delete  Post
    $(document).on('click', '.deletebtn', function () {
        // var stud_id = $(this).val();
        var post_id = $(this).attr('data-id');
        $('#DeleteModal').modal('show');
        $('#deleteing_id').val(post_id);
    });



    //  Delete  Post
    $(document).on('click', '.delete_student', function (e) {
        e.preventDefault();

        $(this).text('Deleting..');
        var id = $('#deleteing_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/user/posts/"+id,
            dataType: "json",
            success: function (response) {
                // console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('.delete_student').text('Yes Delete');
                } else {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('.delete_student').text('Yes Delete');
                    $('#DeleteModal').modal('hide');
                    // fetchstudent();
                }
            }
        });
    });
});
</script>
</html>
