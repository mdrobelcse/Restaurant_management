@extends('layouts.backend.app')


@section('title')

    Category

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-8">
                    @include('layouts.backend.partials.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add category</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.category.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right btn-sm">save</button>
                                <a href="{{ route('admin.category.index') }}" class="btn btn-info btn-sm pull-right">Back</a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

