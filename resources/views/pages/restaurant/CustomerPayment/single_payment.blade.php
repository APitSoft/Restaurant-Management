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
            <div class="box box-primary">

                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="box-body table-responsive">
                            <h3>Add Customer Due Payments</h3>
                        </div>
                    </div>
{{--                    <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                        <div class="info-box">--}}
{{--                            <span class="info-box-icon bg-black"><i class="fa fa-credit-card" aria-hidden="true"></i></span>--}}
{{--                            <div class="info-box-content">--}}
{{--                                <span class="info-box-text">Total Amount</span>--}}
{{--                                <span class="info-box-number">$ {{$tot}}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>


                <div class="box-body">
                    <div class="row">

                        <div class="col-md-4">
                            <form method="post" action="{{route('customer_final_payment')}}">
                                @csrf

                                <div class="form-group">
                                    <label>Order No</label>
                                    <input type="hidden" name="id" value="{{$customer->id}}">
                                    <input type="text" name="online_order_no" readonly class="form-control" value="{{$customer->online_order_no}}">
                                </div>
                                <div class="form-group">
                                    <label>Payment <span class="required_star">*</span></label>
                                    <select name="Pay_name" class="form-control" required>
                                        <option value="">Select Payment</option>
                                        @foreach($pay as $v_pay)
                                            <option value="{{$v_pay->id}}">{{$v_pay->Methord}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Total Payment <span class="required_star">*</span></label>
                                    <input type="text" name="total_due" id="total_due" readonly class="form-control"
                                           value="{{$customer->total_payable}}">
                                </div>
                                <input type="hidden" name="customer_id" value="{{$customer->customer_id}}">
                                <div class="form-group">
                                    <label>Payments Amount </label>
                                    <input type="text" name="payment_amount" class="form-control" onkeyup="calculator();"
                                           id="txtquentity" placeholder="" value="">
                                </div>
                                <div class="form-group">
                                    <label>Final Due </label>
                                    <input type="text" name="final_due" class="form-control" readonly id="txttotal"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Note </label>
                                    <input type="text" name="note" class="form-control" placeholder="" value="">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                        <div class="col-md-8">
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
                                        <th class="title text-center">Method</th>
                                        <th class="title text-center">Amount</th>
                                        <th class="title text-center">Date</th>
                                        <th class="title text-center">Customer Name</th>
                                        <th class="title text-center">NoTE</th>
                                    </tr>
                                    </thead>

                                    <tbody class="purchase_body">
                                    <?php $number = 0; ?>
                                    @foreach($cus as $key)
                                        <tr>
                                            <td>{{ $number+1 }}</td>
                                            <?php $number++; ?>
                                            <td class="text-center">{{$key->methord_id}}</td>
                                            <td class="text-center">$ {{$key->payment_amount}}</td>
                                            <td class="text-center">{{$key->date}}</td>
                                            <td class="text-center">{{$key->customername}}</td>
                                            <td class="text-center">{{$key->note}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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

    <script>
        function calculator() {
            var unitprice = 0.00;

            unitprice = $('#total_due').val();

            var quantity = 0.00;

            quantity = $('#txtquentity').val();

            var total = 0.00;

            total = unitprice - quantity;
            $('#txttotal').val(total);
        }
    </script>

@endsection
