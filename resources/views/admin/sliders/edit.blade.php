@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Edit Slider
                    <a class="card-description left-4 text-decoration-none float-end" href="{{ asset('/admin/slider') }}">
                        Back </a>
                </h4>
                <form action="{{ url('/admin/slider/' . $slider->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $slider->title }}"
                            placeholder="Title Slider">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="10">{{ $slider->description }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset("$slider->image") }}" alt="image" width="60px" height="60px">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="checkbox" name="is_active" {{ $slider->is_active == '1' ? 'checked' : '' }}>
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
