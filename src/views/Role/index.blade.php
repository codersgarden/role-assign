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
            <p class="title pt-3">Roles</p>

            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.create'))
                <a href="{{ route('roles.create') }}" class=" br-11 new_roles btn btn-dark">Add New Role</a>
            @endif
        </div>
    </div>
    <!-- Table -->
    <div class="text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>

                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.edit'))
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm" id="roleEditButton"
                                    title="Edit Role">
                                    <img src="{{ url('edit-icon') }}" alt="Logo">
                                </a>
                            @endif
                            
                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.destroy'))
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                    class="d-inline delete-role-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm delete-role-button" id="roleDeleteButton"
                                        title="Delete Role" data-delete-type="role">
                                        <img src="{{ url('delete-icon') }}" alt="Logo">
                                    </button>
                                </form>
                            @endif


                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.permissions'))
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-sm"
                                    id="rolePermissionButton" title="Manage Permissions">
                                    <i class="fas fa-key"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center fw-bold text-muted">No roles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('roleassign::layouts.pagination', ['paginator' => $roles])
@endsection
