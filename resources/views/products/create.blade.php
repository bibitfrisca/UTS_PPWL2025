@extends('layouts.app')

@section('content')
    <div class="container">
        <h5 style="color:#fff; background-color: #4B0D74; border: 2px solid; padding: 10px; border-radius: 5px;">Add New Product</h5>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="code" style="color: #F05AE0;">Product Code</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" required>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="name" style="color: #F05AE0;">Product Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="price" style="color: #F05AE0;">Price</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="category" style="color: #F05AE0;">Category</label>
                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                    <option value="">-- Select Category --</option>
                    @foreach(App\Models\Product::getCategories() as $category)
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 10px;">Add Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Cancel</a>
            </div>
        </form>
    </div>
@endsection