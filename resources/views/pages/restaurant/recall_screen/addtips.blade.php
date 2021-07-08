@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Tips
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <form action="{{route('assign_tips')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label style="padding:10px 0;">Add Tips</label>
                                        <input type="text" class="form-control" name="manager_tips" placeholder="Enter Tips $">
                                        <input type="hidden" class="form-control" name="sales_id" value="{{$id}}">
                                    </div>
                                    <div class="form-group">
                                        <label style="padding: 10px 0;">Add Note</label>
                                        <textarea class="form-control" name="note" rows="3"></textarea>
                                    </div>
                                    <button class="btn btn-success">Insert</button>
                                </form>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

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

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/stockAdjustment.js'!!}"></script>

@endsection
