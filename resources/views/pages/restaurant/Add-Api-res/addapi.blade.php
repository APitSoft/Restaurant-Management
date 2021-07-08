@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add API
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <form method="post" action="{{route('update-api')}}">
                            @csrf
                            <label>Genarate Api <span class="required_star">*</span></label>
                            <input type="text" name="res_api" value="{{$id}}" class="form-control"
                                   readonly>
                            <br>
                            <a href="{{route('generate')}}" class="btn btn-success btn-outline">Genarate</a>
                            <button type="submit" class="btn btn-success btn-outline">ADD Api</button>
                        </form>
                    </div>
                    @if($api)
                    <div class="col-md-6">
                        <label>My Api <span class="required_star">*</span></label>
                        <input type="text" class="form-control" value="{{$api->res_api}}" id="myInput" readonly>
                        <br>
                        <button class="btn btn-success btn-outline" onclick="myFunction()">Copy Api</button>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            // alert("Copied the text: " + copyText.value);
        }
    </script>
@endsection
