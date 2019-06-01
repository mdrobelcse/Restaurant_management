@extends('layouts.backend.app')


@section('title')

    Category Update

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-8">
                    @include('layouts.backend.partials.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update item</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.item.update',$item->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Name:</label>
                                            <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Price:</label>
                                            <input type="text" class="form-control" name="price" value="{{ $item->price }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Category:</label>
                                            <select class="form-control" name="category" id="category">
                                                <option selected disabled>Select one</option>

                                                @foreach($categories as $category)
                                                    <option {{ $item->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom: 35px;margin-top: 35px;">

                                        <label class="bmd-label-floating">Item Image:</label>
                                        <input type="file" name="image">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description:</label>
                                            <textarea class="form-control" name="description">{{ $item->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right btn-sm">save</button>
                                <a href="{{ route('admin.item.index') }}" class="btn btn-info btn-sm pull-right">Back</a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

