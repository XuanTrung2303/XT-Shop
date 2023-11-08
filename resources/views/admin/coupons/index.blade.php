@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-body">
                <h4 class="card-title">
                    All Coupons
                    <a class="card-description left-4 text-decoration-none float-end"
                        href="{{ asset('/admin/coupon/create') }}">
                        Add Coupon</a>
                </h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <th> Coupon Code</th>
                            <th> Type </th>
                            <th> Value </th>
                            <th> Min Cart Amount </th>
                            <th> From </th>
                            <th> Till </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupons->perPage() * ($coupons->currentPage() - 1) + $loop->iteration }}</td>
                                <td> {{ $coupon->code }} </td>
                                <td> {{ $coupon->type }} </td>
                                <td> {{ $coupon->value }} </td>
                                <td> {{ $coupon->min_cart_amount ? $coupon->min_cart_amount : 'N/A' }} VND </td>
                                <td>{{ $coupon->from_valid->format('d-m-Y h:i A') }}</td>
                                <td>{{ $coupon->till_valid ? $coupon->till_valid->format('d-m-Y h:i A') : '' }}</td>
                                <td>
                                    <a href="{{ url('admin/coupon/edit/' . $coupon->id) }}"
                                        class="btn btn-success text-white"><i class="mdi mdi-eyedropper-variant"></i></a>
                                    <a href="#" onClick="deleteCoupon({{ $coupon->id }})" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" class="btn btn-danger text-white"><i
                                            class="mdi mdi-close"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Coupon Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ url('admin/coupon/delete/' . $coupon->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-body">
                                                <h6>Are you sure you want to delete this data?</h6>
                                            </div>
                                            {{-- @php
                                                dd($coupon->id);
                                            @endphp --}}
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
                    {{ $coupons->links() }}
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
