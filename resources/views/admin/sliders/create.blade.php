@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Create Slider
                    <a class="card-description left-4 text-decoration-none float-end" href="{{ asset('/admin/slider') }}">
                        Back </a>
                </h4>
                <form action="{{ url('/admin/slider') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title Slider">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        {{-- <input type="text" class="form-control" name="slug" placeholder="Slug Category"> --}}
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="checkbox" name="is_active">
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-success me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
