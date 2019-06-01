@extends('layouts.backend.app')


@section('title')

    View Reservation

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">View reservation</h4>
                        </div>
                        <div class="card-body">

                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name:</label>
                                            <input type="text" class="form-control" name="name" value="{{ $reserve->name }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone:</label>
                                            <input type="text" class="form-control" name="price" value="{{ $reserve->phone }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">E-mail:</label>
                                            <input type="text" class="form-control" name="price" value="{{ $reserve->email }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Date and time:</label>
                                            <input type="text" class="form-control" name="price" value="{{ $reserve->date_and_time }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Message:</label>
                                            <textarea class="form-control" name="message" readonly>{{ $reserve->message }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('admin.reservation.index') }}" class="btn btn-info btn-sm pull-right">Back</a>
                                <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

