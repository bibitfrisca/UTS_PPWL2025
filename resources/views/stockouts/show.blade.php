@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">Stock Out Details</h1>
    <div class="card" style="background-color: #D529B4; color: #FFFFFF; padding: 20px; border-radius: 10px;">
        <h3 style="color: #FFFFFF;">Stock Out Code: {{ $stockout->stockout_code }}</h3>
        <p><strong>Date:</strong> {{ $stockout->date }}</p>
        <p><strong>Handled By:</strong> {{ $stockout->user?->name ?? 'Unknown' }}</p>
    </div>

    <h3 style="color: #4B0D74;" class="mt-4">Products in this Stock Out</h3>
    <table class="table table-striped" style="background-color: #FFFFFF; color: #000000;">
        <thead>
            <tr>
                <style>
                    td, th {
                        border-right: 1px solid rgb(222, 201, 237); /* Garis antar kolom */
                        padding: 10px;
                    }

                    /* Hapus garis kanan untuk kolom terakhir */
                    td:last-child, th:last-child {
                        border-right: none;
                    }
                </style>
                <th scope="col" style="text-align: center">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Boxes</th>
            </tr>
        </thead>
        <tbody>
            @php
                $products = explode(',', $stockout->product_name);
                $quantities = explode(',', $stockout->quantity);
                $totalBoxes = 0;
            @endphp
            @foreach ($products as $index => $productName)
                @php
                    $quantity = isset($quantities[$index]) ? (int) $quantities[$index] : 0;
                    $boxes = ceil($quantity / 12);
                    $totalBoxes += $boxes;
                @endphp
                <tr>
                    <th scope="row" style="text-align: center">{{ $index + 1 }}</th>
                    <td>{{ trim($productName) }}</td>
                    <td>{{ $quantity }}</td>
                    <td>{{ $boxes }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total Boxes:</strong></td>
                <td><strong>{{ $totalBoxes }}</strong></td>
            </tr>
        </tfoot>
    </table>
    <a href="{{ route('stockouts.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Back to List</a>
</div>
@endsection
