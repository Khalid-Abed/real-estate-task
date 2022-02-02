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
    <style>
        input[type="number"]::placeholder
        {
            text-align: right;
        }
    </style>
@endsection


@section('content')
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">الملف الشخصي</a></li>
                        <li class="breadcrumb-item active">تعديل بيانات منشور </li>
                    </ol>
                </div>
                <h4 class="page-title">تعديل بيانات منشور </h4>
            </div>
        </div>
    </div>
<!-- end page title -->



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="">تعديل بيانات منشور </h4>
                <div class="col-sm">
                    <form class="needs-validation" method="post" action="{{route('posts.update',$post->id)}}"  enctype="multipart/form-data"  novalidate>
                        @csrf
                        @method('put')

                        <div class="row form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03" class="my-1">عنوان المنشور </label>
                                <input name="title" type="text" class="form-control" id="validationCustom03" placeholder="عنوان المنشور " value="{{ $post->title }}" required>
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="invalid-feedback">
                                    هذا الحقل مطلوب
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03" class="my-1">رقم الهاتف </label>
                                <input name="contact_number" type="text" class="form-control" id="validationCustom03" placeholder="رقم الهاتف " value="{{ $post->contact_number }}" required>
                                @error('contact_number')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="invalid-feedback">
                                    هذا الحقل مطلوب
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03" class="my-1">الكمية </label>
                                <textarea rows="5" name="description"  class="form-control" id="validationCustom03" placeholder="الكمية " required>{{ $post->description }}</textarea>
                                @error('description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="invalid-feedback">
                                    هذا الحقل مطلوب
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03" class="my-1">الصورة </label>
                                <input name="image" type="file" accept="image/*" class="form-control" id="validationCustom03" placeholder="الصورة " >
                                @error('image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="invalid-feedback">
                                    هذا الحقل مطلوب
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success my-3" type="submit">تعديل الوظيفة</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary my-3" type="submit">ألغاء الامر</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection




@section('js')
<script src="{{asset('dashboard/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('dashboard/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
<!-- Dashboar 1 init js-->
<script src="{{asset('dashboard/assets/js/pages/dashboard-1.init.js')}}"></script>
@endsection
