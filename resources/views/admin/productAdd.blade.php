@extends('admin.layouts.main')
@section('productEdit')
    <main>
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Edit Product</h2>
                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
            </div>
            <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" 
                    value="{{ $data->product_name }}">
                </div>
                <div class="mb-3">
                    <label for="product_price" class="form-label
                    ">Product Price</label>
                    <input type="number" class="form-control" id="product_price" name="product_price"
                     value="{{ $data->product_price }}">
                </div>
                <div class="mb-3">
                    <label for="product_image" class="form-label
                    ">Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">
                    <img src="{{ asset('product_images/'.$data->product_image) }}" alt="" style="width: 100px; height: 100px;">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label
                    ">Category</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="product_bid_start" class="form-label
                    ">Bid Start</label>
                    <input type="datetime-local" class="form-control" id="product_bid_start" 
                    name="product_bid_start" value="{{ date('Y-m-d\TH:i', strtotime($data->product_bid_start)) }}">
                </div>
                <div class="mb-3">
                    <label for="product_bid_end" class="form-label
                    ">Bid End</label>
                    <input type="datetime-local" class="form-control" id="product_bid_end"
                     name="product_bid_end" value="{{ date('Y-m-d\TH:i', strtotime($data->product_bid_end)) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </main>
@endsection
