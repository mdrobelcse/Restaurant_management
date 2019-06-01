@extends('layouts.backend.app')


@section('title')

    Slider

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">




                <div class="col-md-12">

                   @include('layouts.backend.partials.message')

                    <a href="{{ route('admin.slider.create') }}" class="btn btn-success btn-sm"><span><i class="material-icons">add</i></span>add new slider</a>
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Slider</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table"  cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>

                                    @if($sliders->count() > 0)

                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/slider/'.$slider->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{ $slider->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $slider->id }}" action="{{ route('admin.slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteSlider({{ $slider->id }})"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @else

                                        <tr>
                                            <td>Slider not available</td>
                                        </tr>

                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('js')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        function deleteSlider(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        document.getElementById('delete-form-'+id).submit();
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });



        }
    </script>

@endpush

