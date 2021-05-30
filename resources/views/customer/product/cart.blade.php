@extends('master')
@section('content')
    @include('header2')
    <div id="main">
        <section class="breadcrumbs">
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">
        @if (Cart::isEmpty())
            <h1 class="alert alert-warning">Your shopping cart is empty.</h1>
        @else
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"> </th>
                        <th scope="col">Name</th>
                        <th scope="col">Available</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::getcontent() as $item)
                    <tr>
                        <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                        <td>{{ $item->name }}</td>
                        <td>In stock</td>
                        <td>1</td>
                        <td class="text-right">{{ $item->price }}</td>
                        <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
            @endif
    </div>
</div>
        </section>
    </div>
@endsection
<!-- Footer -->
