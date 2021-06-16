@extends('frontend.master.master')
@section('content')

    <section id="aa-catg-head-banner">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Wishlist Page</h2>

                </div>
            </div>
        </div>
    </section>

    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table aa-wishlist-table">
                            <form action="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Per unit</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
                                            <td><a href="#"><img src="img/man/polo-shirt-1.png" alt="img"></a></td>
                                            <td><a class="aa-cart-title" href="#">Polo T-Shirt</a></td>
                                            <td>$250</td>
                                            <td>In Stock</td>
                                            <td><a href="{{route('cart')}}" class="aa-add-to-cart-btn">Add To Cart</a></td>
                                        </tr>
                                        <tr>
                                            <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
                                            <td><a href="#"><img src="img/man/polo-shirt-2.png" alt="img"></a></td>
                                            <td><a class="aa-cart-title" href="#">citamol</a></td>
                                            <td>$150</td>
                                            <td>In Stock</td>
                                            <td><a href="#" class="aa-add-to-cart-btn">Add To Cart</a></td>
                                        </tr>
                                        <tr>
                                            <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
                                            <td><a href="#"><img src="img/man/polo-shirt-3.png" alt="img"></a></td>
                                            <td><a class="aa-cart-title" href="#">Polo T-Shirt</a></td>
                                            <td>$50</td>
                                            <td>In Stock</td>
                                            <td><a href="#" class="aa-add-to-cart-btn">Add To Cart</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->


    <!-- Subscribe section -->
    <section id="aa-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-subscribe-area">
                        <h3>Subscribe our newsletter </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
                        <form action="" class="aa-subscribe-form">
                            <input type="email" name="" id="" placeholder="Enter your Email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection