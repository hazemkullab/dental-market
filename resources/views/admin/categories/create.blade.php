@extends('admin.master')

@section('title','Create Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> Add New </h1>
    
    <a class="btn btn-outline-success" href="{{ route('admin.categories.index') }}">Return Back</a>

</div>


@include('admin.errors')

     <div class="card shadow mb-4">
                        <div class="card-body">
                                <form action="{{ route('admin.categories.store') }}" method="POST">
                                    @csrf
                                    @include('admin.categories.form')
                                        <div class="col-md-12">
                                            <button class="btn btn-success px-5">Add</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>



@stop