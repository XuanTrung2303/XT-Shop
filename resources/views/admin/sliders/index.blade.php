@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-body">
                <h4 class="card-title">
                    All Sliders
                    <a class="card-description left-4 text-decoration-none float-end"
                        href="{{ asset('/admin/slider/create') }}">
                        Add Slider</a>
                </h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <th> Image </th>
                            <th> Title</th>
                            <th class="py-1"> Description </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $sliders->perPage() * ($sliders->currentPage() - 1) + $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset("$slider->image") }}" alt="image"
                                        style="width:100px;height:100px" />
                                </td>
                                <td> {{ $slider->title }} </td>
                                <td>{{ $slider->description }}</td>
                                <td>{{ $slider->is_active == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/slider/edit/' . $slider->id) }}"
                                        class="btn btn-success text-white"><i class="mdi mdi-eyedropper-variant"></i></a>
                                    <a href="#" onClick="deleteSlider()" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" class="btn btn-danger text-white"><i
                                            class="mdi mdi-close"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Slider Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ url('admin/slider/delete/' . $slider->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-body">
                                                <h6>Are you sure you want to delete this data?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-white"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary text-white">Yes.
                                                    Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {!! $sliders->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        })
    </script>
@endpush
