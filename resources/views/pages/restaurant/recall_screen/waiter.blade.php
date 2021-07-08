@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Change Waiiter
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                   <div class="row">
                       <div class="col-md-1"></div>
                       <div class="col-md-4">
                           <form action="{{URL::to('update_waiter/'.$sales)}}" method="post">
                               @csrf
                           <div class="form-group">
                               <label style="font-size: 20px; padding:10px 0;">Select Waiter</label>
                               <select class="form-control" name="waiter_id">
                                   <option>Select Waiter</option>
                                   @foreach($waiter as $key)
                                   <option value="{{$key->id}}">{{$key->manager_name}}</option>
                                   @endforeach
                               </select>
                           </div>
                               <button class="btn btn-success">Update</button>
                           </form>
                       </div>
                       <div class="col-md-4">
                           <form action="{{URL::to('update_waiter/'.$sales)}}" method="post">
                               @csrf
                               <div class="form-group">
                                   <label style="font-size: 20px; padding:10px 0;">Select Group</label>
                                   <select class="form-control" name="waiter_group">
                                       <option>Select Group</option>
                                       @foreach($waiter_group as $key)
                                           <option value="{{$key->id}}">{{$key->group_name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <button class="btn btn-success">Update</button>
                           </form>
                       </div>
                       <div class="col-md-1"></div>
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
