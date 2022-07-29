@extends('layouts.app')
@section('title','Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <a href="{{route('admin.room.index')}}">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">bed</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Rooms</p>
                    <h4 class="mb-0">{{$rooms->count()}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-secondary text-sm font-weight-bolder">{{$available_room->count()}}</span> are available now</p>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <a href="{{route('admin.category.index')}}">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">category</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Categories</p>
                    <h4 class="mb-0">{{$categories->count()}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-info text-sm font-weight-bolder">Click </span>to see details</p>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <a href="{{route('admin.facility.index')}}">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">bed</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Facilities</p>
                    <h4 class="mb-0">{{$facilities->count()}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Click </span>to see more</p>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <a href="{{route('admin.contact')}}">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">mark_email_unread</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Unread Messages</p>
                    <h4 class="mb-0">{{$contacts->count()}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{$total_contact->count()}} </span> total request</p>
            </div>
        </div>
    </a>
</div>


<div class="row mb-4 mt-5">
    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Quick view</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">

                </div>
            </div>
        </div>
    </div>





    @endsection

    @push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    @endpush