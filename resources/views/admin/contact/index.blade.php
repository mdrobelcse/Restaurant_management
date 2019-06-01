@extends('layouts.backend.app')


@section('title')

    Contact

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">




                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Contact</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table"  cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Sent At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>


                                     @if($contacts->count() > 0)

                                         @foreach($contacts as $key=>$contact)
                                             <tr>
                                                 <td>{{ $key + 1 }}</td>
                                                 <td>{{ $contact->name }}</td>
                                                 <td>{{ $contact->subject }}</td>
                                                 <td>{{ $contact->created_at }}</td>
                                                 <td>
                                                     <a href="{{ route('admin.contact.show',$contact->id) }}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>

                                                     <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.contact.destroy',$contact->id) }}" style="display: none;" method="POST">
                                                         @csrf
                                                         @method('DELETE')
                                                     </form>
                                                     <button type="button" class="btn btn-danger btn-sm" onclick="deleteContact({{ $contact->id }})"><i class="material-icons">delete</i></button>
                                                 </td>
                                             </tr>
                                         @endforeach

                                      @else

                                         <tr>

                                             <td>Contact not available</td>

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
        function deleteContact(id) {
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

