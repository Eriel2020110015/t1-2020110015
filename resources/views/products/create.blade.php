@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id">Product ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id"
                    maxlength="12" required>
                @error('id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name"
                    name="product_name" required>
                @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="retail_price">Retail Price</label>
                <input type="number" step="0.01" class="form-control @error('retail_price') is-invalid @enderror"
                    id="retail_price" name="retail_price" required>
                @error('retail_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="wholesale_price">Wholesale Price</label>
                <input type="number" step="0.01" class="form-control @error('wholesale_price') is-invalid @enderror"
                    id="wholesale_price" name="wholesale_price" required>
                @error('wholesale_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="origin">Origin (2 letters)</label>
                <input type="text" class="form-control @error('origin') is-invalid @enderror" id="origin"
                    name="origin" maxlength="2" required>
                @error('origin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                    name="quantity" min="0" required>
                @error('quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="product_image"
                    name="product_image" accept="image/*">
                @error('product_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
