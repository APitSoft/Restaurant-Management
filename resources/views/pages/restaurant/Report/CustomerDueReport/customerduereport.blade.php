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
            <div>
                <h1>
                    Customer Due Report
                </h1>
            </div>

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
                                    <th class="title" style="width: 10%">Customer Name</th>
                                    <th class="title" style="width: 10%">Order No</th>

                                    <th class="title" style="width: 10%">Total Items</th>
                                    <th class="title" style="width: 10%">Unit Price</th>
                                    <th class="title" style="width: 10%">Discount Type</th>
                                    <th class="title" style="width: 5%">Discount Amount</th>
                                    <th class="title" style="width: 5%">Price With Discount</th>
                                    <th class="title" style="width: 10%">Price Without Discount</th>
                                    <th class="title" style="width: 10%">Sub Total</th>
                                    <th class="title" style="width: 10%">Order Status</th>
                                    <th class="title" style="width: 10%">Order Type</th>
                                    <th class="title" style="width: 10%">Total</th>
                                    <th class="title" style="width: 20%">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $number = 0; ?>
                                @foreach($customer_due as $key)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <?php $number++; ?>
                                        <td>{{$key->customername}}</td>
                                        <td>{{$key->online_order_no}}</td>

                                        <td>{{$key->total_items}}</td>
                                        <td>{{$key->menu_unit_price}}</td>
                                        <td>{{$key->discount_type}}</td>
                                        <td>{{$key->discount_amount}}</td>
                                        <td>{{$key->menu_price_with_discount}}</td>
                                        <td>{{$key->menu_price_without_discount}}</td>
                                        <td>{{$key->sub_total}}</td>
                                        @if($key->order_status =='1')
                                            <td>
                                                <button type="button"  class="btn btn-success" data-id="{{ $key->order_status }}">
                                                    New Order
                                                </button>
                                            </td>
                                        @endif
                                        @if($key->order_status =='2')
                                            <td>
                                                <button type="button"  class="btn btn-info" data-id="{{ $key->order_status }}">
                                                    Accepted Order
                                                </button>
                                            </td>
                                        @endif
                                        @if($key->order_status =='3')
                                            <td><button type="button"  class="btn btn-primary" data-id="{{ $key->order_status }}">
                                                    Rejected Order
                                                </button>
                                            </td>
                                        @endif
                                        @if($key->order_type =='2')
                                            <td>
                                                <button type="button"  class="btn btn-success" data-id="{{ $key->order_type }}">
                                                    Dine In
                                                </button>
                                            </td>
                                        @endif
                                        @if($key->order_type =='3')
                                            <td>
                                                <button type="button"  class="btn btn-info" data-id="{{ $key->order_type }}">
                                                    Delivery
                                                </button>
                                            </td>
                                        @endif
                                        @if($key->order_type =='4')
                                            <td>
                                                <button type="button"  class="btn btn-primary" data-id="{{ $key->order_type }}">
                                                    Take Away
                                                </button>
                                            </td>
                                        @endif
                                        <td>{{$key->total_payable}}</td>
                                        <td>{{$key->sale_date}}</td>
                                        {{-- <td>
                                            <a class="btn btn-primary" role="button" href="Details-SupplierDueReport/{{$key->id}}">Details</a>
                                        </td>     --}}
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
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>
@endsection
