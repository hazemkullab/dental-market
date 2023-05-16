@extends('admin.master')

@section('title','All products')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> {{ ($type =='trash')?'Trashed dealer':'All products' }} </h1>

    <a class="btn btn-outline-success" href="{{ route('admin.products.create') }}">Add New dealer</a>

</div>
@if (session('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
           {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

     <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ ($type =='trash')?'Trashed dealer':'All products' }}</h6>
                            @if ($type=='trash')
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.products.index') }}"><i class="fas fa-tag"></i> All</a>
                            @else
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.products.trash') }}"><i class="fas fa-trash"></i> Trash</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>English Name</th>
                                        <th>Arabic Name</th>
                                        <th>Dealer</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Action</th>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>English Name</th>
                                        <th>Arabic Name</th>
                                        <th>Dealer</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                    @forelse ( $products as $product )
                                            <tr>
                                                <td>{{ $product->en_name }}</td>
                                                <td>{{ $product->ar_name }}</td>
                                                <td>{{ $product->dealer ? $product->dealer->trans_name : '' }}</td>
                                                <td><img width="100" class="img-thumbnail" src="{{ asset(('uploads/'.$product->image)) }}"></td>
                                                <td>{{ $product->price }}$</td>
                                                <td>{{ $product->discount }}%</td>
                                                <td>


                                                    @if ($type =='trash')
                                                    <a href="{{ route('admin.products.restore',$product->id) }}" class="btn btn-info btn-sm"><i
                                                            class="fas fa-trash-restore"></i></a>
                                                    <form class="d-inline" action="{{ route('admin.products.forceDelete',$product->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are you sure?!')" class="btn btn-dark btn-sm"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>
                                                    @else
                                                    <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form class="d-inline" action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                    @endif


                                                </td>

                                                </tbody>

                                            </tr>
                                    @empty
                                            <tr>
                                                <td colspan="5" style="text-align:center">Theres no Products </td>
                                            </tr>
                                    @endforelse
{{--
                                        @foreach ($products as $product)

                                    @endforeach
                                             --}}
                                </table>
                            </div>
                        </div>
                    </div>



@stop
