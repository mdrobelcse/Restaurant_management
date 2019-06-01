@extends('layouts.backend.app')


@section('title')
    Admin dashboard
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Category/Item</p>
                            <h3 class="card-title">{{ $categoryCount }}/{{ $itemCount }}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Slider</p>
                            <h3 class="card-title">{{ $sliderCount }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> Last 24 Hours
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Reservation</p>
                            <h3 class="card-title">{{ $reservations->count() }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Tracked from Github
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Contact</p>
                            <h3 class="card-title">{{ $contactCount }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.backend.partials.message')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Reservations</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->phone }}</td>
                                        <th>
                                            @if($reservation->status == true)
                                                <span class="label label-info">Confirmed</span>
                                            @else
                                                <span class="label label-danger">not Confirmed yet</span>
                                            @endif

                                        </th>
                                        <td>
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
                                </tbody>
                            </table>
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