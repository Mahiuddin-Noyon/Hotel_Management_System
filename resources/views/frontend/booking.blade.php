@extends('frontend.layouts.app')

@section('title','booking')

@section('content')
<div class="hero-wrap" style="background-image: url({{asset('uploads/room/'. $room->image)}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread"> Booking</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="col-lg-12">
            <div class="sidebar-wrap bg-light ftco-animate">
                <h3 class="heading mb-4">Advanced Search</h3>


                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="fields col-md-12">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="date" name="checkin_date" class="form-control " placeholder="Check In Date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" name="checkout_date" class="form-control " placeholder="Check Out Date" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <small for="">Total price per night in USD:</small>
                                    <input type="text" name="price" value="{{$room->price}}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <small for="">Total adults:</small>
                                    <input type="text" name="person" value="{{$room->person}}" class="form-control" readonly>
                                </div>

                                <div class="card-footer">
                                    <button id="card-button" class="btn btn-success btn-block" type="submit"> Confirm </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>

            </div>




</section>
</div>
@endsection