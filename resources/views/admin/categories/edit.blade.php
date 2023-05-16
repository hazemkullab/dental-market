@extends('admin.master')

@section('title','Create Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> Update :{{ $category->trans_name }} </h1>

    <a class="btn btn-outline-success" href="{{ route('admin.categories.index') }}">Return Back</a>

</div>


@include('admin.errors')

<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('put')

                @include('admin.categories.form')
                    <div class="col-md-12">
                        <button class="btn btn-info px-5">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop