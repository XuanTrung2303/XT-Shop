@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Edit Coupon
                    <a class="card-description left-4 text-decoration-none float-end" href="{{ asset('/admin/coupon') }}">
                        Back </a>
                </h4>
                <form action="{{ url('/admin/coupon/' . $coupon->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control" name="code" value="{{ $coupon->code }}"
                            placeholder="Enter Coupon Code">
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Coupon Type</label>
                        <select name="type" class="form-control">
                            <option value="">Select</option>
                            <option value="Fixed" {{ $coupon->type == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                            <option value="Percentage" {{ $coupon->type == 'Percentage' ? 'selected' : '' }}>Percentage
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Coupon Value</label>
                        <input type="number" name="value" value="{{ $coupon->value }}" placeholder="Enter Coupon Value"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Min Cart Amount</label>
                        <input type="number" name="min_cart_amount" value="{{ $coupon->min_cart_amount }}"
                            placeholder="Enter Min Cart Amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Valid From<span class="text-red-500 font-bold">*</span></label>
                        <input type="datetime-local" name="from_valid" value="{{ $coupon->from_valid }}"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Valid To<span class="text-red-500 font-bold">*</span></label>
                        <input type="datetime-local" name="till_valid" value="{{ $coupon->till_valid }}"
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-gradient-success me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
