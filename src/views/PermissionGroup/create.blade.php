@extends('roleassign::layouts.app')

@section('content')
    <div class="content">
        <div class="ms-5 me-5 mt-4">
            <!-- Breadcrumb -->
            <nav class="mb-3">
                <a href="{{ route('permission-groups.index') }}" class="fw-400 text-decoration-none">Permission Group</a>
                <img src="{{ url('pervious-icon') }}" alt="Logo" class="fw-400 mx-2">
                <span class="fw-400">Add new Permission Group</span>
            </nav>

            <!-- Title -->
            <h2 class="title pt-2 text-uppercase">Add Permission Group</h2>
        </div>


    <div class="container mt-5">

        <form action="{{ route('permission-groups.store') }}" method="post" class="w-50 mx-auto rounded">
            @csrf
            <div class="mb-3">
                <label for="role" class="form-label">Permission Group</label>
                <input type="text" id="Permission Group" name="name" placeholder="Enter Permission Group"
                    class="form-control">

                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <button type="submit" class="br-11 new_roles btn btn-dark">Add Permission Group</button>

        </form>
    </div>
@endsection
