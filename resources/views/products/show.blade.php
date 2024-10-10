@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product Name: {{ $product->product_name }}</h5>
                <p class="card-text"><strong>Product ID:</strong> {{ $product->id }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $product->description ?? 'No description available' }}
                </p>
                <p class="card-text"><strong>Retail Price:</strong> ${{ number_format($product->retail_price, 2) }}</p>
                <p class="card-text"><strong>Wholesale Price:</strong> ${{ number_format($product->wholesale_price, 2) }}</p>
                <p class="card-text"><strong>Origin:</strong> {{ $product->origin }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>

                @if ($product->product_image)
                    <p class="card-text"><strong>Product Image:</strong></p>
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}"
                        class="img-fluid">
                @else
                    <p class="card-text"><strong>Product Image:</strong> No image available.</p>
                @endif

                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?');">Delete Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
