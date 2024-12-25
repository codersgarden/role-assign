@extends('roleassign::layouts.app')

@section('content')
    <div class="content">
        <div class="ms-5 me-5 mt-4">
            <!-- Breadcrumb -->
            <nav class="mb-3">
                <a href="{{ route('permissions.index') }}" class="fw-400 text-decoration-none">Permission</a>
                <img src="{{ url('pervious-icon') }}" alt="Logo" class="fw-400 mx-2">
                <span class="fw-400">Edit Permission</span>
            </nav>

            <!-- Title -->
            <h2 class="title pt-2 text-uppercase">Edit Permission</h2>
        </div>
    </div>

    <div class="container mt-5">
        <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="w-50 mx-auto p-4 rounded">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" placeholder="Permission Name"
                    value="{{ old('name', $permission->name) }}" class="form-control">

                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif

                <label for="permission_group_id" class="form-label mt-2">Permission Group</label>

                <select name="permission_group_id" id="permission_group_id" class="form-select form-control">
                    <option value="">Select Permission Group</option>
                    @foreach ($permissionGroups as $permissionGroup)
                        <option value="{{ $permissionGroup->id }}"
                            {{ $permissionGroup->id == $permission->permission_group_id ? 'selected' : '' }}>
                            {{ $permissionGroup->name }}
                        </option>
                    @endforeach
                </select>


                @if ($errors->has('permission_group_id'))
                    <div class="text-danger">{{ $errors->first('permission_group_id') }}</div>
                @endif

                <label for="route" class="form-label mt-2">Route</label>
                <input type="text" id="route" name="route" class="form-control"
                    value="{{ old('route', $permission->route) }}" placeholder="Enter Route">

                @if ($errors->has('route'))
                    <div class="text-danger">{{ $errors->first('route') }}</div>
                @endif
            </div>

            <button type="submit" class="br-11 new_roles btn btn-dark">Edit Permission</button>
        </form>
    </div>
@endsection
