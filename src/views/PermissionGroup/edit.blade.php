@extends('roleassign::layouts.app')

@section('content')
    <div class="content">
        <div class="ms-5 me-5 mt-4">
            <!-- Breadcrumb -->
            <nav class="mb-3">
                <a href="{{ route('permission-groups.index') }}" class="fw-400 text-decoration-none">Permission Group</a>
                <img src="{{ url('pervious-icon') }}" alt="Logo" class="fw-400 mx-2">
                <span class="fw-400">Edit Permission Group</span>
            </nav>

            <!-- Title -->
            <h2 class="title pt-2 text-uppercase">Edit Permission Group</h2>
        </div>

    <div class="container mt-5">


        <form action="{{ route('permission-groups.update', $permissionGroup->id) }}" method="post"
            class="w-50 mx-auto rounded">
            @csrf

            <div class="mb-3">
                <label for="permissionGroup" class="form-label">Permission Group</label>
                <input type="text" id="permissionGroup" name="name" value="{{ old('name', $permissionGroup->name) }}"
                    placeholder="permissionGroup" class="form-control">

                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif


            </div>
            <button type="submit" class="br-11 new_roles btn btn-dark ">Edit Permission Group</button>
        </form>
    </div>
@endsection
