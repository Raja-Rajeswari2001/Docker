@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-warning text-white">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control"
                        rows="4">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                        class="form-control" min="0" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price (₹)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01"
                        class="form-control" min="0" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label><br>
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="100" height="100"
                        class="mb-2 rounded"><br>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Update Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection