@extends('admin.master')

@section('title','Create dealers')
@section('scripts')



@stop
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> Add New </h1>

    <a class="btn btn-outline-success" href="{{ route('admin.dealers.index') }}">Return Back</a>

</div>


@include('admin.errors')

     <div class="card shadow mb-4">
                        <div class="card-body">
                                <form action="{{ route('admin.dealers.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.dealers.form')
                                        <div class="col-md-12">
                                            <button class="btn btn-success px-5">Add</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>



@stop
