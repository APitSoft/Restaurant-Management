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
                            <h3>Kitchen Panels</h3>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary"
                                   href="{{route('kitchen-panels.create')}}">Add Kitchen Panel
                                </a>
                            </div>

                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 25%">Name</th>
                                    <th class="title" style="width: 35%">Description</th>
                                    {{--<th class="title" style="width: 20%">Added By</th>--}}
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($kitchens) > 0)
                                    @foreach($kitchens as $k=>$v)
                                        <tr>
                                            <th scope="row">{{$k + 1}}</th>
                                            <td>{{$v->name}}</td>
                                            <td>{{$v->description}}</td>
                                            {{--<td>{{$v->creatorInfo->manager_name}}</td>--}}
                                            <td>
                                                <a class="btn btn-primary" role="button"
                                                   href="{{route('panels.singlePanel', [$v->id])}}">Show</a>
                                                <a class="btn btn-primary" role="button"
                                                   href="{{route('kitchen-panels.edit', [$v->id])}}">Edit</a>

                                                <a class="btn btn-primary"
                                                   role="button" data-id="{{$v->id}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/kitchenPanels.js'!!}"></script>
@endsection
