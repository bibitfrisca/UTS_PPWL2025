@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">Product Details</h1>
    <div class="card" style="background-color: #D529B4; color: #FFFFFF; padding: 20px; border-radius: 10px;">
        <h3 style="color: #FFFFFF;">Product Code: {{ $product->code }}</h3>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Price:</strong> Rp{{ number_format($product->price, 2) }}</p>
        <p><strong>Category:</strong> {{ $product->category }}</p>
    </div>

    <h3 style="color: #4B0D74;" class="mt-4">Product Information</h3>
    <table class="table table-striped" style="background-color: #FFFFFF; color: #000000;">
        <thead>
            <tr style="background-color: #4B0D74; color: #FFFFFF;">
                <style>
                    td, th {
                        border-right: 1px solid rgb(222, 201, 237);
                        padding: 10px;
                    }
                    td:last-child, th:last-child {
                        border-right: none;
                    }
                </style>
                <th scope="col" style="text-align: center;">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">1</td>
                <td>{{ $product->name }}</td>
                <td>Rp{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->category }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('products.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Back to List</a>
</div>
@endsection