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
                Assign Server
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
                                    <th class="title" style="width: 10%">Waiter / Group Name</th>

{{--                                    <th class="title" style="width: 10%">Group Name</th>--}}


{{--                                    <th class="title" style="width: 10%">Tips</th>--}}
{{--                                    <th class="title" style="width: 10%">Note</th>--}}
                                    <th class="title" style="width: 15%">Action</th>
                                    <th class="title" style="width: 15%">Assign</th>
                                </tr>
                                </thead>


                                <tbody>
                                <?php $number = 1; ?>
                                @foreach($waiter_det as $key)
                                    <tr>
                                        <td>{{$number}}</td>
                                        <?php $number=$number+1; ?>
                                    <td>{{$key->sale_no}}</td>
                                        <td>
                                            @php
$name = DB::table('tbl_restaurant_users')->where('id',$key->waiter_id)->first()->manager_name;
echo $name
                                            @endphp
                                            ||
                                        @if($key->group_id)


                                                @php
                                                    $name = DB::table('tbl_restaurants_group')->where('id',$key->group_id)->first()->group_name;
                                                    echo $name;
                                                @endphp
                                            @else
                                            @php
                                                echo 'Eull';
                                                @endphp

                                        @endif



                                            </td>
{{--                                        @if($key->group_id)--}}
{{--                                        <td>--}}

{{--                                            @php--}}
{{--                                                $name = DB::table('tbl_restaurants_group')->where('id',$key->group_id)->first()->group_name;--}}
{{--                                                echo $name;--}}
{{--                                            @endphp--}}
{{--                                        </td>--}}
{{--                                        @endif--}}

                                        @if($key->order_status =='1' || $key->order_status =='2')
                                            <td>
                                                <a class="btn btn-success" role="button" href="#" style="margin: 0 10px;">Open Ticket</a>
                                                <a class="btn btn-info" role="button" href="add_tips/{{$key->id}}">Add Tips</a>
                                            </td>
                                        @endif
                                        @if($key->order_status =='3')
                                            <td>
{{--                                                <a class="btn btn-warning" role="button" href="#" style="margin: 0 6px;">Closed Ticket</a>--}}
                                                <button style="margin: 0 6px;" type="button" onclick="closeTicket({{$key->id}})" class="btn btn-warning" data-toggle="modal" data-target="#exampleModa">
                                                    Closed Ticket
                                                </button>
                                                <a class="btn btn-info" role="button" href="add_tips/{{$key->id}}">Add Tips</a>
                                            </td>
                                        @endif
                                        <td>
                                            <a class="btn btn-success" role="button" href="change_waiter/{{$key->id}}">Change Waiter</a>
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
                        order_typee="";

                    orderr_time+= data.order_time;
                    sale+= data.sale_date;
                    table+= data.table_id;
                    paid+= data.paid_amount;
                    due+= data.due_total;
                    total+= data.total_payable;
                    order_statuss+= data.order_status;
                    order_typee+= data.order_type;


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


                }
            });

        }
    </script>

@endsection
