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

                                <div class="form-group">
                                    <div class="card-header">
                                        <label for="card-element">
                                            Enter your credit card information
                                        </label>
                                    </div>
                                    <div class="card-body">
                                        <div id="card-element">
                                        </div>
                                        <div id="card-errors" role="alert"></div>
                                        <input type="hidden" name="plan" value="" />
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button id="card-button" class="btn btn-success btn-block" type="submit" data-secret="{{ $intent }}"> Confirm </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>

            </div>


</section>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    const stripe = Stripe('{{ $stripe_key }}', {
        locale: 'en'
    }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', {
        style: style
    }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
    });
</script>
@endsection