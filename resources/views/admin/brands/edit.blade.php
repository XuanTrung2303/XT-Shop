@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Edit Brand
                    <a class="card-description left-4 text-decoration-none float-end" href="{{ asset('/admin/brand') }}">
                        Back </a>
                </h4>
                <form action="{{ url('/admin/brand/' . $brand->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $brand->name }}"
                            placeholder="Name Brand">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $brand->slug }}"
                            placeholder="Slug Brand">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="checkbox" name="is_active" {{ $brand->is_active == '1' ? 'checked' : '' }}>
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
