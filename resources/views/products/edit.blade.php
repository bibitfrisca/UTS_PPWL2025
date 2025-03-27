@extends('layouts.app')

@section('content')
    <div class="container">
        <h5 style="color:#fff; background-color: #4B0D74; border: 2px solid; padding: 10px; border-radius: 5px;">Edit Product</h5>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="code" style="color: #F05AE0;">Product Code</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ $product->code }}" required>
                @if ($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="name" style="color: #F05AE0;">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="price" style="color: #F05AE0;">Price</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" required>
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="category" style="color: #F05AE0;">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach(App\Models\Product::getCategories() as $category)
                        <option value="{{ $category }}" {{ $product->category == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 10px;">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Cancel</a>
        </form>
    </div>
@endsection
