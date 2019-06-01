@extends('layouts.backend.app')


@section('title')

    Category Update

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">View item</h4>
                        </div>
                        <div class="card-body">

                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Name:</label>
                                            <input type="text" class="form-control" name="name" value="{{ $item->name }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Price:</label>
                                            <input type="text" class="form-control" name="price" value="{{ $item->price }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Category:</label>
                                            <input type="text" class="form-control" name="price" value="{{ $item->category->name }}" readonly>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom: 35px;margin-top: 35px;">

                                        <label class="bmd-label-floating">Item Image:</label>
                                        <img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" style="height: 100px; width: 100px" alt="">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description:</label>
                                            <textarea class="form-control" name="description" readonly>{{ $item->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('admin.item.index') }}" class="btn btn-info btn-sm pull-right">Back</a>
                                <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

