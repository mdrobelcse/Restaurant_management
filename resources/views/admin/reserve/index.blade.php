@extends('layouts.backend.app')


@section('title')

    Reservation

@endsection


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">




                <div class="col-md-12">

                   @include('layouts.backend.partials.message')

                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Reservation</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table"  cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>


                                      @if($reservations->count() >0)

                                          @foreach($reservations as $key=>$reservation)
                                              <tr>
                                                  <td>{{ $key + 1 }}</td>
                                                  <td>{{ $reservation->name }}</td>
                                                  <td>{{ $reservation->phone }}</td>
                                                  <td>{{ $reservation->email }}</td>
                                                  <th>
                                                      @if($reservation->status == true)
                                                          <span class="label label-info">Confirmed</span>
                                                      @else
                                                          <span class="label label-danger">not Confirmed yet</span>
                                                      @endif

                                                  </th>
                                                  <td>


                                                      <a href="{{ route('admin.reservation.show',$reservation->id) }}" class="btn btn-success btn-sm"><i class="material-icons">visibility</i></a>
                                                      @if($reservation->status == false)
                                                          <form id="status-form-{{ $reservation->id }}" action="{{ route('admin.reservation.status',$reservation->id) }}" style="display: none;" method="POST">
                                                              @csrf
                                                          </form>
                                                          <button type="button" class="btn btn-info btn-sm" onclick="confirmReservation({{ $reservation->id }})"><i class="material-icons">done</i></button>
                                                      @endif
                                                      <form id="delete-form-{{ $reservation->id }}" action="{{ route('admin.reservation.destory',$reservation->id) }}" style="display: none;" method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                      </form>
                                                      <button type="button" class="btn btn-danger btn-sm" onclick="deletedReservation({{ $reservation->id }})"><i class="material-icons">delete</i></button>
                                                  </td>
                                              </tr>
                                          @endforeach

                                      @else

                                          <tr>

                                              <td>Reservation not available</td>

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

        //confirmed reservation

        function confirmReservation(id) {
            swal({
                title: "Are you sure?",
                text: "are you verify by phone?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        document.getElementById('status-form-'+id).submit();
                    } else {
                        swal("not confirm");
                    }
                });


        }

        //delete reservation

        function deletedReservation(id) {
            swal({
                title: "Are you sure?",
                text: "you want to delete this reservation?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        document.getElementById('delete-form-'+id).submit();
                    } else {
                        swal("not confirm");
                    }
                });


        }



    </script>

@endpush

