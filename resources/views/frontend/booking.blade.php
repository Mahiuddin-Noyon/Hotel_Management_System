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

                @php
                $stripe_key = 'pk_test_51KxyHYIEYo0gWEDaaiUzb6i8F4yqVaOwX82dZYVtbyhTtQbBk7XT4aUv0uiiTa2jXMiAiIlkHhz6NkUjiYa32maV00zFBppqiU';
                @endphp

                <form action="{{route('store', $room->id)}}" method="post">
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
                            </div>

                            <div class="form-group">
                                <small>Enter the payment method</small>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="cod" checked onclick="cod()">
                                    <label class="form-check-label" for="cod">
                                        Cash on Delivery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="mobile_banking" onclick="bkash()">
                                    <label class="form-check-label" for="mobile_banking">
                                        Bkash
                                    </label>
                                </div>
                            </div>

                            <div class="form-group" style="display: none ;" id="bkash">
                                <div class="card" style="width: 18rem;">
                                    <img src="https://www.tbsnews.net/sites/default/files/styles/big_2/public/images/2019/07/11/bkash_logo_0.jpg?itok=70lkuu3X&timestamp=1562856146" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Bkash</h5>
                                        <p class="card-text">Send your payment to this number <small>01xxx xxx xxx</small> and enter the transaction id below </p><br>
                                        <input type="text" name="transection_id" class="form-control" placeholder="ex: Td7zcY29cZ" required> <span class="placeholder col-12 bg-success">ex: Td7zcY29cZ</span>
                                    </div>
                                </div>
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
<script>
    function bkash() {
        document.getElementById("bkash").style.display = "block";
    }
</script>
@endsection