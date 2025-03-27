@extends('layouts.app')

@section('content')
    <div class="container">
        <h5 style="color:#fff; background-color: #4B0D74; border: 2px solid; padding: 10px; border-radius: 5px;">Add Stock Out</h5>
        <form action="{{ route('stockouts.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="product_name" style="color: #F05AE0;">Product Names (comma-separated)</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="e.g., Product1, Product2, Product3" required>
            </div>
            <div class="form-group mb-3">
                <label for="quantity" style="color: #F05AE0;">Quantities (comma-separated)</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="e.g., 24, 36, 48" required>
            </div>
            <div class="form-group mb-3">
                <label for="user_id" style="color: #F05AE0;">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="date" style="color: #F05AE0;">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 10px;">Add</button>
            <a href="{{ route('stockouts.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Cancel</a>
        </form>
    </div>
@endsection
