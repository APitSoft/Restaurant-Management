@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Show Serve Group
            </h1>
            @if (session('success'))
                <div class="alert alert-success">
                    <p style="color: red;"> {{ session('success') }}</p>
                </div>
            @endif
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                </div>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Name</th>
{{--                                    <th class="title text-center">Phone</th>--}}
                                    <th class="title text-center">Role</th>
                                    <th class="title text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                <?php $number = 0; ?>
                                @foreach($Show as $v_img)
                                    <tr class="purchase_row">
                                        <td class="text-center">{{$number+1}}</td>
                                        <?php $number++; ?>
                                        <td class="text-center">{{$v_img->group_name}}</td>
{{--                                        <td class="text-center">{{$v_img->email}}</td>--}}
                                        <td class="text-center">{{$v_img->role}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a style="margin: 0 10px;" class="btn btn-primary" role="button" href="Serve-Group/{{$v_img->id}}">Edit</a>
                                                <a style="margin: 0 10px;" class="btn btn-danger" role="button" href="Delete-Serve-Group/{{$v_img->id}}">Delete</a>
                                                <a style="margin: 0 10px;" class="btn btn-primary" role="button" href="Add-Waiter-Group/{{$v_img->id}}">Add Waiter</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
@endsection
