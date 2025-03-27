@extends('layouts.app')

@section('content')
    <div class="container">
        <h5 style="color:#fff; background-color: #4B0D74; border: 2px solid; padding: 10px; border-radius: 5px;">Add New Product</h5>
        <div class="card mt-3">
            <div class="card-header" style="background-color: #4B0D74; color: #fff;">
                <div class="float-start">
                    Add New Product
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm" style="background-color: #4B0D74; border-color: #4B0D74;">&larr; Back</a>
                </div>
            </div>
            <div class="card-body" style="background-color: #8813A8; color: #fff;">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="code" style="color: #F05AE0;">Product Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" style="background-color: #fff; color: #000;">
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" style="color: #F05AE0;">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" style="background-color: #fff; color: #000;">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" style="color: #F05AE0;">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" style="background-color: #fff; color: #000;">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" style="color: #F05AE0;">Category</label>
                        <select name="category" id="category" class="form-control" style="background-color: #fff; color: #000;">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74;">Add Product</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection