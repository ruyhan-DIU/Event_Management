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
@foreach($services as $service)

                                    <div class="card-deck">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h2 class="card-text">{{ $service->name }}</h2>
                                                <p class="card-text">{{ $service->capacity }} Persons</p>
                                                <p class="card-text">{{ $service->pricerange }} BDT</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>







        @endsection
