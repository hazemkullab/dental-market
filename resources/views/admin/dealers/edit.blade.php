@extends('admin.master')

@section('title','Create dealers')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> Update :{{ $dealer->trans_name }} </h1>

    <a class="btn btn-outline-success" href="{{ route('admin.dealers.index') }}">Return Back</a>

</div>


@include('admin.errors')

<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('admin.dealers.update', $dealer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('admin.dealers.form')
                    <div class="col-md-12">
                        <button class="btn btn-info px-5">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop