@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 style="color:#fff; background-color: #4B0D74; border: 2px solid; padding: 10px; border-radius: 5px;">Edit Stockout</h5>
        <a href="{{ route('stockouts.index') }}" class="btn btn-primary btn-sm" style="background-color: #4B0D74; border-color: #4B0D74;">&larr; Back</a>
    </div>
        <form action="{{ route('stockouts.update', $stockout->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="stockout_code" style="color: #F05AE0;">Stock Out Code</label>
                <input type="text" name="stockout_code" id="stockout_code" class="form-control" value="{{ $stockout->stockout_code }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="product_id" style="color: #F05AE0;">Product</label>
                <select name="product_id" id="product_id" class="form-control">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $stockout->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="product_name" style="color: #F05AE0;">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $stockout->product_name }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="user_id" style="color: #F05AE0;">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $stockout->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="name" style="color: #F05AE0;">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $stockout->name }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="quantity" style="color: #F05AE0;">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $stockout->quantity }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="date" style="color: #F05AE0;">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $stockout->date }}" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 10px;">Update</button>
            <a href="{{ route('stockouts.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Cancel</a>
        </form>
    </div>
@endsection