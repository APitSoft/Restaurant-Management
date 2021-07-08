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
                    <div class="box-body table-responsive">
                        <h3>Add Customer Due Payments</h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <form method="post" action="{{route('add_customer_payment')}}">
                            @csrf
                            <div class="form-group">
                                <label>Select Customer <span class="required_star">*</span></label>
                                <select name="customer_id" class="form-control">
                                    <option value="0">Select Customer</option>
                                    @if(isset($customer))
                                    @foreach($customer as $key)
                                        <option value="{{$key->customer_id}}">{{$key->customername}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                        <table id="datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="title" style="width: 5%">SN</th>
                                <th class="title" style="width: 5%">Order No</th>
                                <th class="title" style="width: 5%">Paid</th>
                                <th class="title" style="width: 5%">Due</th>
                                <th class="title" style="width: 10%">Discount Amount</th>
                                <th class="title" style="width: 10%">Price With Discount</th>
                                <th class="title" style="width: 5%">Sub Total</th>
                                <th class="title" style="width: 5%">Total Payable</th>
                                <th class="title" style="width: 5%">Date</th>
                                <th class="title" style="width: 5%">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($payment_det))
                            <?php $number = 0; ?>
                            @foreach($payment_det as $data)
                                <tr>
                                    <td>{{ $number+1 }}</td>
                                    <?php $number++; ?>
                            <td>{{$data->online_order_no}}</td>
                            <td>$ {{$data->paid_amount}}</td>
                            <td>$ {{$data->due_amount}}</td>
                            <td>$ {{$data->total_item_discount_amount}}</td>
                            <td>{{$data->sub_total_with_discount}}</td>
                            <td>{{$data->sub_total}}</td>
                            <td>$ {{$data->total_payable}}</td>
                            <td>{{$data->sale_date}}</td>
                            <td>
                                <div class="btn-group">
                                    <div class="form-group">
                                         <a class="btn btn-primary" role="button"
                                           href="{{route('customer_payment', [$data->id])}}">Payment</a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>


@endsection
