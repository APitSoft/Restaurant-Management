@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Serve Group
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <form method="post" action="{{route('update-Serve-Group')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$Show->id}}">
                    <div class="col-md-6">
                        <label>Serve Group Name<span class="required_star">*</span></label>
                        <input type="text" name="group_name" class="form-control" value="{{$Show->group_name}}"
                               placeholder="Name">
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <label>Email <span class="required_star">*</span></label>--}}
{{--                        <input type="text" name="email" class="form-control" value="{{$Show->email}}"--}}
{{--                               placeholder="Email">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <label>Password <span class="required_star">*</span></label>--}}
{{--                        <input type="password" name="password" class="form-control"--}}
{{--                               placeholder="Password">--}}
{{--                    </div>--}}
                    <div class="">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Update Serve
                            </button>
                            <a href="" role="button" class="btn btn-danger">Back </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
@endsection
