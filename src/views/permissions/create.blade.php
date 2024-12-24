@extends('roleassign::layouts.app')

@section('content')
    <div class="content bg-color">
        <div class="d-flex justify-content-between align-items-center ms-5 me-5">
            <p class="title pt-3">Create Permission</p>
            <a href="{{ route('permissions.index') }}" class=" br-11 new_roles btn btn-dark">Back</a>
        </div>
    </div>

    <div class="container mt-5">
        <form action="{{ route('permissions.store') }}" method="post" class="w-50 mx-auto p-4 rounded">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" id="name" name="name" placeholder="Role Name" class="form-control">

                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif

                <label for="permission_group_id" class="form-label mt-2">Permission Group</label>
                <select name="permission_group_id" id="permission_group_id" class="form-select">
                    <option value="">Select Permission Group</option>
                    @foreach ($permissionGroups as $permissionGroup)
                        <option value="{{ $permissionGroup->id }}">
                            {{ $permissionGroup->name }}
                        </option>
                    @endforeach
                </select>

                @if ($errors->has('permission_group_id'))
                    <div class="text-danger">{{ $errors->first('permission_group_id') }}</div>
                @endif


                <label for="route" class="form-label mt-2">Route</label>
                <input type="text" id="route" name="route" placeholder="Route" class="form-control">


                @if ($errors->has('route'))
                    <div class="text-danger">{{ $errors->first('route') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>

    </div>
@endsection
