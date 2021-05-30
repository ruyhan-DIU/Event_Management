

@extends('master')

@section('content')
    @include('header2')
<!-- Content Wrapper. Contains page content -->

    <div id="main">
        <section class="breadcrumbs">
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Manage Products</h1>
                            </div>
                            <!--<div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Manage Products</li>
                                </ol>
                            </div> -->
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Title</th>
                                        <th>Price</th>
                                        <th>Type</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <a href="{{ route('provider.product.edit', $product->id) }}" class="btn btn-block btn-outline-primary btn-lg">Edit</a>
                                                <form method="post" action="{{ route('provider.product.delete', $product->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-outline-danger btn-lg">Delete</button>
                                                </form>













                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>


                        </div>
                        <!-- /.card-body -->


                    </div>

                </section>
            </div>
        </section>

    </div>

<script>
  $(function () {

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



@endsection
