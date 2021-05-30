@extends('master')

@section('content')
    @include('header2')
    <!-- Page Wrapper -->

    <section id="main">
        <section class="breadcrumbs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">


                        <div class="card-body">



                            <div class="chat">

                                <h1>{{ $meeting->provider->username }}</h1>
                                @if (Session::has('success'))
                                    <div class="identity">
                                        <p>{{ Session::get('success') }}</p>
                                    </div>

                                @endif
                                    <div class="msgbody">
@if(isset($messages))
                                        @foreach($messages as $message)
                                            @if($message->sender=='customer')

                                                    <div class="sender">
                                                        {{ $message->messagebody }}
                                                    </div>

                                                @else

                                                <div class="reciver">
                                                    {{ $message->messagebody }}

                                                </div>
                                                @endif
                                                    @endforeach
@endif



    <form class="inputclass" action="{{ route('customer.sendmessage', $meeting->id) }}" method="POST">
   @csrf
        <input type="text" name="messagebody" />
        <button type="submit"> <i class="fa fa-paper-plane" aria-hidden="true"></i> </button>
    </form>
                                        </div>
                                    </div>

                            </div>



                        </div>
                    </div>
                </div>



        </section>
    </section>







@endsection
