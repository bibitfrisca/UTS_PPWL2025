@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Category
                    </div>
                    <div class="float-end">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name_category" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name_category') is-invalid @enderror"
                                    id="name_category" name="name_category" value="{{ old('name_category') }}">
                                @if ($errors->has('name_category'))
                                    <span class="text-danger">{{ $errors->first('name_category') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
