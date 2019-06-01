@extends('layouts.backend.app')


@section('title')

    Slider Update

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-8">
                    @include('layouts.backend.partials.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update Slider</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.slider.update',$slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sub Title</label>
                                            <input type="text" class="form-control" name="sub_title" value="{{ $slider->sub_title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <a href="{{ route('admin.slider.index') }}" class="btn btn-danger btn-sm">Back</a>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

