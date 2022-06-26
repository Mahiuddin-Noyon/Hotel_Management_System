@extends('frontend.layouts.app')

@section('title','home')

@section('content')
<div class="hero-wrap" style="background-image: url({{asset('frontend/images/bg_1.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread">Hotel Management System</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-booking">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="#" class="booking-form">
                    <div class="row">
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="#">Check-in Date</label>
                                    <input type="text" class="form-control checkin_date" placeholder="Check-in date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="#">Check-out Date</label>
                                    <input type="text" class="form-control checkout_date" placeholder="Check-out date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="#">Room</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Suite</option>
                                                <option value="">Family Room</option>
                                                <option value="">Deluxe Room</option>
                                                <option value="">Classic Room</option>
                                                <option value="">Superior Room</option>
                                                <option value="">Luxury Room</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="#">Customer</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">1 Adult</option>
                                                <option value="">2 Adult</option>
                                                <option value="">3 Adult</option>
                                                <option value="">4 Adult</option>
                                                <option value="">5 Adult</option>
                                                <option value="">6 Adult</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group d-flex align-self-stretch">
                                <input type="submit" value="Check Availability" class="btn btn-primary py-3 px-4 align-self-stretch">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-reception-bell"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">25/7 Front Desk</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-serving-dish"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Restaurant Bar</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-car"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Transfer Services</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-spa"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Spa Suites</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Our Room Categories</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <a href="#">
                        <img src="{{asset('uploads/category/'. $category->image)}}" class="img d-flex justify-content-center align-items-center" alt="image">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3 text-center">
                        <h3 class="mb-3"><a href="rooms.html">{{$category->name}}</a></h3>
                        <hr>
                        <p class="pt-1"><a href="{{route('room')}}" class="btn-custom">View all <span class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection