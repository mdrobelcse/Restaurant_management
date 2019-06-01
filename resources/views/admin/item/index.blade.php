@extends('layouts.backend.app')


@section('title')

    Category

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">




                <div class="col-md-12">

                   @include('layouts.backend.partials.message')

                    <a href="{{ route('admin.item.create') }}" class="btn btn-success btn-sm"><span><i class="material-icons">add</i></span>add new item</a>
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead class=" text-primary">
                                    <th width="10%">SL</th>
                                    <th width="15%">Name</th>
                                    <th width="15%">Price</th>
                                    <th width="15%">Category</th>
                                    <th width="20%">Image</th>
                                    <th width="25%">Action</th>

                                    </thead>
                                    <tbody>


                                 @if($items->count() > 0)

                                   @foreach($items as $key=>$item)

                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                        <td>

                                            <a href="{{ route('admin.item.edit',$item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">create</i></a>
                                            <a href="{{ route('admin.item.show',$item->id) }}" class="btn btn-success btn-sm"><i class="material-icons">visibility</i></a>
                                            <button class="btn btn-danger btn-sm waves-effect" type="button" onclick="deleteItem({{ $item->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.item.destroy',$item->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>

                                    </tr>

                                   @endforeach

                                 @else


                                   <tr>
                                       <td><p class="text-center">Item not available</p></td>

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
        function deleteItem(id) {
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

