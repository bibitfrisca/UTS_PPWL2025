@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">Product List</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ $message }}
        </div>
    @endif
    @can('create-product')
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3" style="background-color: #4B0D74; border-color: #4B0D74;">Add New Product</a>
    @endcan
    <table class="table table-striped" style="background-color: #D529B4; color: #FFFFFF;">
        <thead>
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                <style>
                    td, th {
                        border-right: 1px solid rgb(222, 201, 237); /* Garis antar kolom */
                        padding: 10px;
                    }
                    td:last-child, th:last-child {
                        border-right: none;
                    }
                </style>
                    <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm" style="margin-right: 5px;"><i class="bi bi-eye"></i> Show</a>
                        @can('edit-product')
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 5px;"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan
                        @can('delete-product')
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="background-color: #8813A8; border-color: #8813A8;" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection