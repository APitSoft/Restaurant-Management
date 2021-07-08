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
                Recall Screen
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 10%">Order No</th>
                                    <th class="title" style="width: 10%">Total Items</th>
                                    <th class="title" style="width: 10%">Sub Total</th>
                                    <th class="title" style="width: 10%">Waiter Name</th>
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $number = 0; ?>
                                @foreach($waiter_det as $key)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <?php $number++; ?>
                                        <td>{{$key->sale_no}}</td>
                                        <td>{{$key->total_items}}</td>
                                        <td>{{$key->sub_total}}</td>
                                        <td>{{$key->waiter_name}}</td>
                                        @if($key->order_status =='1' || $key->order_status =='2')
                                            <td>
{{--                                                <a class="btn btn-success" role="button" href="#">Open Ticket</a>--}}
                                                <button type="button" onclick="openTicket({{$key->id}})" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                                    Open Ticket
                                                </button>
                                            </td>
                                        @endif
                                        @if($key->order_status =='3')
                                            <td>
{{--                                                <a class="btn btn-warning" role="button" href="#">Closed Ticket</a>--}}
                                                <button type="button" onclick="closeTicket({{$key->id}})" class="btn btn-warning" data-toggle="modal" data-target="#exampleModa">
                                                    Closed Ticket
                                                </button>
                                            </td>
                                        @endif
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Open Ticket Details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="title text-center" style="width: 10%">Date</th>
                                <th class="title text-center" style="width: 20%">Order Time</th>
                                <th class="title text-center" style="width: 20%">Cooking Start Time</th>
                                <th class="title text-center" style="width: 20%">Cooking Done Time</th>
                                <th class="title text-center" style="width: 10%">Table No</th>
                                <th class="title text-center" style="width: 10%">Order Type</th>
                                <th class="title text-center" style="width: 20%">Order Status</th>
                            </tr>
                            </thead>
                            <tbody class="purchase_body">
                            <tr class="purchase_row">
                                <td class="text-center" id="sale_date"></td>
                                <td class="text-center" id="order_time"></td>
                                <td class="text-center" id="cooking_start_time"></td>
                                <td class="text-center" id="cooking_done_time"></td>
                                <td class="text-center" id="table_id"></td>
                                <td class="text-center" id="order_type"></td>
                                <td class="text-center" id="order_status"></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Close Ticket -->
        <div class="modal fade" id="exampleModa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Closed Ticket Details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="title text-center" style="width: 10%">Date</th>
                                <th class="title text-center" style="width: 15%">Order Time</th>
                                <th class="title text-center" style="width: 10%">Table No</th>
                                <th class="title text-center" style="width: 10%">Paid</th>
                                <th class="title text-center" style="width: 5%">Due</th>
                                <th class="title text-center" style="width: 10%">Total</th>
                                <th class="title text-center" style="width: 10%">Order Type</th>
                                <th class="title text-center" style="width: 20%">Order Status</th>
                                <th class="title text-center" style="width: 20%">Shift</th>
                            </tr>
                            </thead>
                            <tbody class="purchase_body">
                            <tr class="purchase_row">
                                <td class="text-center" id="order"></td>
                                <td class="text-center" id="sale"></td>
                                <td class="text-center" id="table"></td>
                                <td class="text-center" id="paid"></td>
                                <td class="text-center" id="due"></td>
                                <td class="text-center" id="total"></td>
                                <td class="text-center" id="order_typee"></td>
                                <td class="text-center" id="order_statuss"></td>
                                <td class="text-center" id="shiftname"></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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

    <script>
    function openTicket(id)
    {
    $.ajax({
    type: "GET",
    url: "recall_supplier/" + id,
    dataType: 'JSON',
    error: function(xhr, status, error) {
    var errorMessage = xhr.status + ': ' + xhr.statusText
    alert(errorMessage);
    },
    success: function(data) {
    console.log(data);
        var order_time ="", sale_date="", cooking_start_time="", cooking_done_time="", order_status="",
            table_id="", order_typee="";

        order_time+= data.order_time;
        sale_date+= data.sale_date;
        cooking_start_time+= data.cooking_start_time;
        cooking_done_time+= data.cooking_done_time;
        table_id+= data.table_id;
        order_status+= data.order_status;
        order_type+= data.order_type;

    if (order_status==1 || order_status==2){
        order='<button class="btn btn-success">Order Running</button>'
    }
    else{
        order='<button class="btn btn-danger">Order Closed</button>'
    }
        if(order_type =='1')
        {
            order_type='<button class="btn btn-success">Dine In</button>'
        }
        else if(order_type =='2'){
            order_type='<button class="btn btn-success">Take Away</button>'
        }
      else{
            order_type='<button class="btn btn-success">Delivery</button>'
        }

    document.getElementById("order_time").innerHTML = order_time;
    document.getElementById("sale_date").innerHTML = sale_date;
    document.getElementById("cooking_start_time").innerHTML = cooking_start_time;
    document.getElementById("cooking_done_time").innerHTML = cooking_done_time;
    document.getElementById("order_status").innerHTML = order;
    document.getElementById("order_type").innerHTML = order_type;
    document.getElementById("table_id").innerHTML = table_id;


    }
    });

    }
    // Close Ticket............................
    function closeTicket(id)
    {
        $.ajax({
            type: "GET",
            url: "recall_supplier/" + id,
            dataType: 'JSON',
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function(data) {
                console.log(data);
            var orderr_time ="", sale="", order_statuss="", table="", paid="", due="", total="",
            order_typee="", shiftname="";

                orderr_time+= data.order_time;
                sale+= data.sale_date;
                table+= data.table_id;
                paid+= data.paid_amount;
                due+= data.due_total;
                total+= data.total_payable;
                order_statuss+= data.order_status;
                order_typee+= data.order_type;
                shiftname+= data.shiftname;


                if(order_statuss==1 || order_statuss==2){
                    order_statuss='<button class="btn btn-success">Order Running</button>'
                }
                else{
                    order_statuss='<button class="btn btn-danger">Order Closed</button>'
                }
                if(order_typee =='1')
                {
                    order_typee='<button class="btn btn-success">Dine In</button>'
                }
                else if(order_typee =='2'){
                    order_typee='<button class="btn btn-success">Take Away</button>'
                }
                else{
                    order_typee='<button class="btn btn-success">Delivery</button>'
                }

                document.getElementById("order").innerHTML = orderr_time;
                document.getElementById("sale").innerHTML = sale;
                document.getElementById("table").innerHTML = table;
                document.getElementById("paid").innerHTML = paid;
                document.getElementById("due").innerHTML = due;
                document.getElementById("total").innerHTML = total;
                document.getElementById("order_typee").innerHTML = order_typee;
                document.getElementById("order_statuss").innerHTML = order_statuss;
                document.getElementById("shiftname").innerHTML = shiftname;


            }
        });

    }

    </script>

@endsection
