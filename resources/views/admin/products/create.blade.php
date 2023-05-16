@extends('admin.master')

@section('title','Create products')
@section('scripts')



@stop
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> Add New </h1>

    <a class="btn btn-outline-success" href="{{ route('admin.products.index') }}">Return Back</a>

</div>


@include('admin.errors')

     <div class="card shadow mb-4">
                        <div class="card-body">
                                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.products.form')
                                        <div class="col-md-12">
                                            <button class="btn btn-success px-5">Add</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>



@stop
