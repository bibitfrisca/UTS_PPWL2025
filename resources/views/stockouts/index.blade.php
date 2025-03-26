@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">Stock Out List</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ $message }}
        </div>
    @endif
    @can('create-stockout')
        <a href="{{ route('stockouts.create') }}" class="btn btn-primary mb-3" style="background-color: #4B0D74; border-color: #4B0D74;">Add Stock Out</a>
    @endcan
    <table class="table table-striped" style="background-color: #D529B4; color: #FFFFFF;">
        <thead>
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">Stock Out Code</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockouts as $stockout)
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
                    <td>{{ $stockout->stockout_code }}</td>
                    <td>{{ $stockout->product_name }}</td>
                    <td>{{ $stockout->quantity }}</td>
                    <td>
                        @can('edit-stockout')
                            <a href="{{ route('stockouts.edit', $stockout->id) }}" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 5px;">Edit</a>
                        @endcan
                        @can('delete-stockout')
                            <form action="{{ route('stockouts.destroy', $stockout->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #8813A8; border-color: #8813A8;">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $stockouts->links() }}
</div>
@endsection