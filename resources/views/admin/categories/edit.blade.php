@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Edit Category
                    <a class="card-description left-4 text-decoration-none float-end" href="{{ asset('/admin/category') }}">
                        Back </a>
                </h4>
                <form action="{{ url('/admin/category/' . $category->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                            placeholder="Name Category">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $category->slug }}"
                            placeholder="Slug Category">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset("$category->image") }}" alt="image" width="60px" height="60px">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="checkbox" name="is_active" {{ $category->is_active == '1' ? 'checked' : '' }}>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-success me-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
