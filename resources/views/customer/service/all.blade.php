@extends('master')

    @section('content')
        @include('header2')
    <!-- Page Wrapper -->

        <section id="main">
            <section class="breadcrumbs">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">


                                <div class="card-body">
                                    @if($errors->any())
                                        <div class="row collapse">
                                            <ul class="alert-box warning radius">
                                                @foreach($errors->all() as $error)
                                                    <li> {{ $error }} </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif


                                    <div class="card-deck">
                                        <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                                        @foreach($services as $service)

                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h2 class="card-text">{{ $service->name }}</h2>
                                                <p class="card-text">{{ $service->capacity }} Persons</p>
                                                <p class="card-text">{{ $service->pricerange }} BDT</p>
                                                <a href="{{ route('customer.addservice', $service->id) }}" class="btn btn-secondary">Add </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>

    </section>







        @endsection
