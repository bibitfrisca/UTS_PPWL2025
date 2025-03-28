@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">Stock In List</h1>
    @can('create-stockin')
        <a href="{{ route('stockins.create') }}" class="btn btn-primary mb-3" style="background-color: #4B0D74; border-color: #4B0D74;">Add Stock In</a>
    @endcan
    <table class="table table-striped" style="background-color: #D529B4; color: #FFFFFF;">
        <thead>
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">Stock In Code</th>
                <th scope="col">Product/s</th>
                <th scope="col">Boxes</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockins as $stockin)
                @php
                    $products = explode(',', $stockin->product_name);
                    $quantities = explode(',', $stockin->quantity);
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
                    <td>{{ $stockin->stockin_code }}</td>
                    <td>
                        <ul>
                            @foreach ((array) $products as $index => $product)
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
                        <a href="{{ route('stockins.show', $stockin->id) }}" class="btn btn-primary" style="color:white; margin-right: 5px;"><i class="bi bi-eye"></i> Show</a>
                        @can('edit-stockin')
                            <a href="{{ route('stockins.edit', $stockin->id) }}" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 5px;">Edit</a>
                        @endcan
                        @can('delete-stockin')
                            <form action="{{ route('stockins.destroy', $stockin->id) }}" method="POST" style="display:inline;">
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
    {{ $stockins->links() }}
</div>
@endsection
