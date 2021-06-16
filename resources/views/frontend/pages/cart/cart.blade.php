@extends('frontend.master.master')
@section('content')
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Name</th>
                                            <th>price</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cardData as $key=>$card)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$card->name}}</td>
                                                <td>Rs : {{$card->price}}</td>
                                                <td>{{$card->quantity}}</td>
                                                <td>
                                                    <img src="{{url('public/backend/uploads/images/product/'.$card->image)}}"
                                                         alt="">
                                                </td>

                                                <td>
                                                    <a href="{{route('delete-orders').'/'.$card->id}}">Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </form>

                            <div class="cart-view-total">
                                <h4>Cart Totals</h4>
                                <table class="aa-totals-table">
                                    <tbody>
                                    <tr>
                                        <th>Total</th>
                                        <td>Rs: {{$totalPrice}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <form action="{{route('check-out')}}" method="post">
                                    {{csrf_field()}}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUB_KEY') }}"
                                            data-amount="{{$totalPrice}}"
                                            data-name="Payment"
                                            data-description="Online medical store"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="usd">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








@endsection