@php
    // Define the list of authorized emails (this could also be passed from the controller)
    $aclConfig = config('custom.acl_users');

    // Ensure ACL_USERS is treated as an array
    $aclEmails = is_array($aclConfig)
        ? $aclConfig
        : array_map(function ($email) {
            return trim($email, "'\"");
        }, explode(',', trim($aclConfig, '[]')));
@endphp

@extends('roleassign::layouts.app')

@section('content')
    <div class="content bg-color">
        <div class="d-flex justify-content-between align-items-center ms-5 me-5">
            <p class="title pt-3">Permissions</p>

            <div class="d-flex align-items-center ms-auto">
                {{-- <form action="{{ route('permissions.index') }}" method="get" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Search by role name"
                        value="{{ request()->get('search') }}">
                    <button type="submit" class="btn btn-dark ms-2">Filter</button>
                </form>
    
                <form action="{{ route('permissions.index') }}" method="get">
                    <button type="submit" class="btn btn-dark ms-2">Back</button>
                </form> --}}

            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.create'))
                <a href="{{ route('permissions.create') }}" class=" br-11 new_roles btn btn-dark">Add New Permission</a>
            @endif

            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="text-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Route</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->route }}</td>
                        <td>{{ $permission->created_at }}</td>
                        <td>
                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.edit'))
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm"
                                    id="editPermissionButton">
                                    <img src="{{ url('edit-icon') }}" alt="Logo">
                                </a>
                            @endif


                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.destroy'))
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="post"
                                    class="d-inline delete-role-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm delete-role-button" id="deletePermissionButton"
                                        title="Delete Role" data-delete-type="permission">
                                        <img src="{{ url('delete-icon') }}" alt="Logo">
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center fw-bold text-muted">No permissions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('roleassign::layouts.pagination', ['paginator' => $permissions])
@endsection
