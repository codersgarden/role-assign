@extends('roleassign::layouts.app')

@section('content')
    <div class="content">
        <div class="ms-5 me-5 mt-4">
            <!-- Breadcrumb -->
            <nav class="mb-3">
                <a href="{{ route('roles.index') }}" class="fw-400 text-decoration-none">Role</a>
                <img src="{{ url('pervious-icon') }}" alt="Logo" class="fw-400 mx-2">
                <span class="fw-400">Edit role</span>
            </nav>

            <!-- Title -->
            <h2 class="title pt-2 text-uppercase">Edit Role</h2>
        </div>


        <!-- Centered form -->
        <div class="container mt-5">
            <form action="{{ route('roles.update', $role->id) }}" method="post" class="w-50 mx-auto rounded">
                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" id="role" name="name" value="{{ old('name', $role->name) }}"
                        placeholder="Enter role name" class="form-control">
                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <button type="submit" class="br-11 new_roles btn btn-dark fs-5">Edit Role</button>
            </form>
        </div>
    @endsection
