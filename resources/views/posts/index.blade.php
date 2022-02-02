@extends('layouts-real-estate.master')


@section('css')
    <link href="{{asset('dashboard/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/custom-style.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

<div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">الملف الشخصي</a></li>
                        <li class="breadcrumb-item active">  حسابي</li>
                    </ol>
                </div>
                <h4 class="page-title"> حسابي</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"> المنشورات</h4>


                    <table id="basic-datatable"   class="table dt-responsive nowrap w-100">

                        <thead>
                            <tr>
                                <th>رقم تعريفي</th>
                                <th>عنوان المنشور</th>
                                <th>المستخدم</th>
                                <th>الهاتف</th>
                                <th>الصورة</th>
                                <th>ادارة</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->user->name }}</td>
                                <td>{{$post->contact_number }}</td>
                                <td>
                                    @if (!is_file($post->image))
                                        <img src="{{ asset('images/posts/'.$post->image)  }}" width="100" height="100"  style="border-radius: 50%" alt="">
                                    @else
                                        <img src="{{ asset('images/posts/default.jpg') }}" width="100" height="100"  style="border-radius: 50%" alt="">
                                    @endif
                                </td>
                                <td>
                                    <a type="button" href="" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                                    <a type="button" href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-warning waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

    </div>



    @endsection




    @section('js')
    <!-- third party js -->
    <script src="{{asset('dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('dashboard/assets/js/pages/datatables.init.js')}}"></script>
    <script>
        $(document).on('click','.deleteCategory',function(){
            var userID=$(this).attr('data-userid');
            $('#app_id').val(userID);
            $('#applicantDeleteModal').modal('show');
        });

        $(document).on('click','.Endless','.Endless',function(){
            $('#applicantDeleteModal').modal('hide');
        });
    </script>
    @endsection
