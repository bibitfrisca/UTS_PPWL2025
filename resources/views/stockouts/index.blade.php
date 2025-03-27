@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">Stock Out List</h1>
    @can('create-stockout')
        <a href="{{ route('stockouts.create') }}" class="btn btn-primary mb-3" style="background-color: #4B0D74; border-color: #4B0D74;">Add Stock Out</a>
    @endcan
    <table class="table table-striped" style="background-color: #D529B4; color: #FFFFFF;">
        <thead>
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">Stock Out Code</th>
                <th scope="col">Product/s</th>
                <th scope="col">Boxes</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockouts as $stockout)
                @php
                    $products = explode(',', $stockout->product_name);
                    $quantities = explode(',', $stockout->quantity);
                @endphp
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
                    <td>
                        <ul>
                            @foreach ($products as $index => $product)
                                <li>{{ trim($product) }} 
                                    ({{ isset($quantities[$index]) ? ceil($quantities[$index] / 12) : '0' }} boxes) 
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ array_sum(array_map(fn($q) => ceil($q / 12), $quantities)) }} boxes
                    </td>
                    <td>
                        <a href="{{ route('stockouts.show', $stockout->id) }}" class="btn btn-primary" style="color:white; margin-right: 5px;"><i class="bi bi-eye"></i> Show</a>
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