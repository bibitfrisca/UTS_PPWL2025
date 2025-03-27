@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">Product List</h1>
    @can('create-product')
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3" style="background-color: #4B0D74; border-color: #4B0D74;">Add Product</a>
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

                        /* Hapus garis kanan untuk kolom terakhir */
                        td:last-child, th:last-child {
                            border-right: none;
                        }
                    </style>
                    <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary" style="color:white; margin-right: 5px;"><i class="bi bi-eye"></i> Show</a>
                        @can('edit-product')
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 5px;">Edit</a>
                        @endcan
                        @can('delete-product')
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #8813A8; border-color: #8813A8;" onclick="return confirm('Do you want to delete this product?');">Delete</button>
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