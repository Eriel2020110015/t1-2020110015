@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Quantity of Products</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalQuantity }}</h5>
                        <p class="card-text">Total number of products stored in the database.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Most Expensive Product</div>
                    <div class="card-body">
                        @if ($mostExpensiveProduct)
                            <h5 class="card-title">{{ $mostExpensiveProduct->product_name }}</h5>
                            <p class="card-text"><strong>Retail Price:</strong>
                                ${{ number_format($mostExpensiveProduct->retail_price, 2) }}</p>
                        @else
                            <p class="card-text">No products available.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Product with Highest Quantity</div>
                    <div class="card-body">
                        @if ($highestQuantityProduct)
                            <h5 class="card-title">{{ $highestQuantityProduct->product_name }}</h5>
                            <p class="card-text"><strong>Quantity:</strong> {{ $highestQuantityProduct->quantity }}</p>
                        @else
                            <p class="card-text">No products available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
