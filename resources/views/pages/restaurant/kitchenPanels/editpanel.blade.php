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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <h3>Edit Kitchen Panels</h3>

                        </div>
                        <!-- /.box-body -->
                        <form method="post" action="{{route('panels-up')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$all->id}}">
                            <div class="col-md-6">
                                <label>Name <span class="required_star">*</span></label>
                                <input type="text" name="name" value="{{$all->name}}" class="form-control"
                                       placeholder="Name">
                            </div>

                            <div class="col-md-6">
                                <label>Description <span class="required_star">*</span></label>
                                <input type="text" name="description" value="{{$all->description}}" class="form-control"
                                       placeholder="description">
                            </div>

                            <div class="">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        ADD
                                    </button>
                                    <a href="" role="button" class="btn btn-danger">Back </a>
                                </div>
                            </div>
                        </form>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/kitchenPanels.js'!!}"></script>
@endsection
