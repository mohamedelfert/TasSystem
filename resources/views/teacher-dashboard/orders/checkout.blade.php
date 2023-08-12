@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.orders') !!}@endsection
@section('header')
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection
@section('breadcrumb')
    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'orders'])
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('main.checkout') !!}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="main-contact-info-body p-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-12 order-1 order-md-1">
                                                        <div class="media-list pb-0">
                                                            <div class="row">
                                                                <div class="media col-12 col-md-12 col-lg-12">
                                                                    <div class="media-body">
                                                                        <div class="alert alert-warning text-center mb-2 col-12 col-md-12 col-lg-12">
                                                                            {{ __('main.slot_cancel_record') }}<strong>$ {{ $price }}</strong>
                                                                            {{ __('main.or_you_can') }}
                                                                            <a href="{{ route('teacher.orders.index') }}">{{ __('main.go_back') }}</a>
                                                                        </div>

                                                                        <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                            <form action="{{ route('teacher.orderFinePay') }}" method="post" id="payment-form">
                                                                                @csrf
                                                                                <div>
                                                                                    <input type="hidden" name="price" value="{{ $price }}"/>
                                                                                    <label for="card-element">
                                                                                        {{ __('main.credit_or_debit_card') }}
                                                                                    </label>
                                                                                    <div id="card-element">
                                                                                        <!-- A Stripe Element will be inserted here. -->
                                                                                    </div>
                                                                                    <!-- Used to display form errors. -->
                                                                                    <div id="card-errors" role="alert"></div>
                                                                                </div>
                                                                                <button class="btn btn-success float-right ml-2 mt-2">  <i class="fa fa-dollar"> @lang('main.pay') </i></button>
                                                                                <p class="alert alert-primary block d-none loading mt-3">{{ __('main.payment_processing') }}</p>
                                                                            </form>
                                                                        </div>

                                                                        <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                            <a href="{{ route('teacher.editSlot',auth()->user()->id) }}"
                                                                               class="btn btn-primary float-right ml-2" title="@lang('main.pay_cash')">
                                                                                <i class="fa fa-edit"> @lang('main.pay_cash') </i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.onload = function () {
            var stripe = Stripe('pk_test_51Kw8xJIJoo2rP2Y39U3CRvtlcOFxG7qM6BKaYjfAPmybUbY5v6GrvJRk519BCs7PiHmuR9fH2Xr6r722S11anJOX00M2CYVpyl');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#32325d',
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
            var card = elements.create('card', {
                style: style
            });
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                $('.loading').removeClass('d-none');
                form.submit();
            }
        }
    </script>
@endsection
