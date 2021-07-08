@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Waiter
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{route('Add-Waiter-Group-new')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-5">
                            <input type="hidden" name="id" value="{{$id}}">
                            <div class="form-group">
                                <label>Waiter <span class="required_star">*</span></label>
                                <select name="waiter" class="form-control">
                                    <option value="">Select Waiter</option>
                                    @foreach($Show as $Waiter)
                                    <option value="{{$Waiter->id}}">{{$Waiter->manager_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    ADD Waiter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th class="title text-center">SN</th>
                            <th class="title text-center">Group Name</th>
                            <th class="title text-center">Waiter Name</th>
                            <th class="title text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="purchase_body">
                        <?php $number = 0; ?>
                        @if($waiter)
                        @foreach($waiter as $v_img)
                            <tr class="purchase_row">
                                <td class="text-center">{{$number+1}}</td>
                                <?php $number++; ?>
                                <td class="text-center">{{$v_img->group_name}}</td>
                                <td class="text-center">{{$v_img->manager_name}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-offset="-185,-75">
                                            <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <a class="dropdown-item edit-link" role="button"
                                               href="../Waiter_All_del/{{$v_img->id}}">Delete</a>
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
        </section>

    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
@endsection
