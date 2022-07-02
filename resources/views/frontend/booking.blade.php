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
                <form action="#">
                    <div class="fields col-md-12">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="checkin_date" id="checkin_date" class="form-control checkin_date" placeholder="Check In Date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="checkout_date" id="checkout_date" class="form-control checkout_date" onchange="calculate()" placeholder="Check Out Date"required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <small for="">Total price in USD:</small>
                                    <input type="text" name="price" value="" id="result" placeholder="{{$room->price}}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="select-wrap one-third">
                                <small for="">Total adults:</small>
                                    <input type="text" name="person" value="{{$room->person}}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="go to payment" class="btn btn-success btn-block py-3 px-5">
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <script>
                function calculate() {
                    var date1 = document.getElementById("checkin_date").value;
                    var result1 = new Date(date1);
                    console.log("result1");
                    var date2 = document.getElementById("checkout_date").value;
                    var result2 = new Date(date2);
                    console.log("result2");


                    var total_time = result2.getTime() - result1.getTime();

                    var total_day_count = total_time / (1000 * 3600 * 24);
                    document.getElementById("result").value = total_day_count*{{$room->price}};
                }
            </script>


</section>
</div>
@endsection