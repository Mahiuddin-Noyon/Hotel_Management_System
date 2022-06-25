@extends('frontend.layouts.app')

@section('title','rooms')

@section('content')
<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="rooms.html">Room</a></span> <span>Room Single</span></p>
                    <h1 class="mb-4 bread">Room Single</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <h2 class="mb-4">{{$room->name}}</h2>
                        <div class="item">
                            <div class="room-img" style="background-image: url({{asset('uploads/room/'. $room->image)}});"></div>
                        </div>
                    </div>
                    <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                        <p>{{$room->description}}</p>
                        <div class="d-md-flex mt-5 mb-5">
                            <ul class="list">
                                <li><span>Max: </span>{{$room->person}} Person</li>
                                <li><span>Category: </span>{{$room->category->name}}</li>
                            </ul>
                            <ul class="list ml-md-5">
                                <li><span>Bed: </span>{{$room->bed}}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div> <!-- .col-md-8 -->


            <div class="col-lg-4 sidebar ftco-animate">


                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Categories</h3>
                        <li><a href="#">Properties <span>(12)</span></a></li>
                        <li><a href="#">Home <span>(22)</span></a></li>
                        <li><a href="#">House <span>(37)</span></a></li>
                        <li><a href="#">Villa <span>(42)</span></a></li>
                        <li><a href="#">Apartment <span>(14)</span></a></li>
                        <li><a href="#">Condominium <span>(140)</span></a></li>
                    </div>
                </div>


            </div>

            <div class="col-lg-12 room-single ftco-animate mb-5">
                <h4 class="mb-4">Available Room</h4>
                <div class="row">
                    
                    <div class="col-sm col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="rooms.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/room-1.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="rooms.html">Suite Room</a></h3>
                                <p><span class="price mr-2">$120.00</span> <span class="per">per night</span></p>
                                <hr>
                                <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->

@endsection