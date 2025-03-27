@extends('layouts.app')

@section('content')
<div class="container">
    <h5 style="color:#fff; background-color: #4B0D74; border: 2px solid; padding: 10px; border-radius: 5px;">Edit User</h5>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" style="color: #F05AE0;">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group mb-3">
            <label for="email" style="color: #F05AE0;">Email Address</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group mb-3">
            <label for="password" style="color: #F05AE0;">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            <small class="text-muted">Leave blank if you don't want to change the password.</small>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group mb-3">
            <label for="password_confirmation" style="color: #F05AE0;">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="roles" style="color: #F05AE0;">Role</label>
            <select name="roles" id="roles" class="form-control @error('roles') is-invalid @enderror" required>
                <option value="" disabled selected>Select a role</option>
                @forelse ($roles as $role)
                    @if ($role != 'Admin')
                        <option value="{{ $role }}" {{ old('roles', $user->roles->pluck('name')->first()) == $role ? 'selected' : '' }}>
                            {{ $role }}
                        </option>
                    @else
                        @if (Auth::user()->hasRole('Admin'))
                            <option value="{{ $role }}" {{ old('roles', $user->roles->pluck('name')->first()) == $role ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                        @endif
                    @endif
                @empty
                    <option disabled>No roles available</option>
                @endforelse
            </select>
            @if ($errors->has('roles'))
                <span class="text-danger">{{ $errors->first('roles') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 10px;">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary" style="background-color: #8813A8; border-color: #8813A8;">Cancel</a>
    </form>
</div>
@endsection