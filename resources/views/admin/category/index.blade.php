@extends('layouts.backend.app')


@section('title')

    Category

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">




                <div class="col-md-10">

                   @include('layouts.backend.partials.message')

                    <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-sm"><span><i class="material-icons">add</i></span>add new category</a>
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All category</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead class=" text-primary">
                                    <th width="10%">SL</th>
                                    <th width="30%">Name</th>
                                    <th width="30%">Slug</th>
                                    <th width="30%">Action</th>

                                    </thead>
                                    <tbody>


                                    @if($categories->count() > 0)

                                   @foreach($categories as $key=>$category)

                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>

                                            <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">create</i></a>
                                            <button class="btn btn-danger btn-sm waves-effect" type="button" onclick="deleteCategory({{ $category->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>

                                    </tr>


                                   @endforeach

                                   @else


                                        <tr>

                                            <td>Category not available</td>

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
        function deleteCategory(id) {
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

