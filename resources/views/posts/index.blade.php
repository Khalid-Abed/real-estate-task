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
</head>
<body>


<div class="container">
    <div class="card ">
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs my-2">Add New Post</button>
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

<div class="modal fade" id="linkEditorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="linkEditorModalLabel">Link Editor</h4>
            </div>
            <div class="modal-body">
                <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                    <div class="form-group">
                        <label for="inputLink" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="Enter Title" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLink" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="description" name="description"
                                   placeholder="Enter description" value=""></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contact Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contact_number" name="contact_number"
                                   placeholder="Enter Link contact_number" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="image" name="image"
                                   placeholder="Enter Link image" value="">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                </button>
                <input type="hidden" id="link_id" name="link_id" value="0">
            </div>
        </div>
    </div>
</div>


</body>

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

    ////----- Open the modal to CREATE a link -----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#linkEditorModal').modal('show');
    });

    ////----- Open the modal to UPDATE a link -----////
    $('body').on('click', '#edit-record', function () {
        var post_id = $(this).attr('data-id');
        $.get('posts/'+ post_id, function (data) {
            console.log(data)
            $('#link_id').val(data.id);
            $('#title').val(data.title);
            $('#description').val(data.description);
            $('#contact_number').val(data.contact_number);
            $('#btn-save').val("update");
            $('#linkEditorModal').modal('show');
        })
    });

    // // edit record
    // $(document).on('click','#edit-record',function(){
    //     var id=$(this).attr('data-id')
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         'url':"posts/edit/"+id,
    //         'type':'get',
    //         'data':{'id',id},
    //         'success':function(result){

    //         },
    //         'error':function(error){

    //         }
    //     })
    //     console.log(id)

    // })

    // // delete record
    // $(document).on('click','#delete-record',function(){
    //     var id=$(this).attr('data-id')
    //     console.log(id)

    // })

  });
</script>
</html>
