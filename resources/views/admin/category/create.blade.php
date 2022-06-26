@extends('layouts.app')
@section('title','Category')

@push('css')

@endpush

@section('content')
<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">New Category</h6>
        </div>
    </div>
    <div class="card-content">
        <form role="form" action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data" class="text-start">
            @csrf
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <label class="form-label">Category Image</label> 
            <div class="input-group input-group-outline my-3">
                <input type="file" name="image" class="form-control">
            </div>
            <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>


@endsection

@push('js')

@endpush