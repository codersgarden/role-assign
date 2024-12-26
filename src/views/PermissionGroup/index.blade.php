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
        <div class="d-flex justify-content-between align-items-center ms-lg-5 me-lg-5 ms-md-0 me-md-0 ms-sm-0 me-sm-0">
            <p class="title pt-3">Permission Group</p>

            <div class="d-flex align-items-center ms-auto">
                @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.create'))
                    <a href="{{ route('permission-groups.create') }}" class=" br-11 new_roles btn btn-dark">Add New Permission
                        Group</a>
                @endif
            </div>
        </div>
    </div>

    <table class="table  text-center table-responsive">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($permissionGroups as $permissionGroup)
                <tr>
                    <td>{{ $permissionGroup->name }}</td>
                    <td>{{ $permissionGroup->slug }}</td>
                    <td>{{ $permissionGroup->created_at }}</td>
                    <td>
                        @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.edit'))
                            <a href="{{ route('permission-groups.edit', $permissionGroup->id) }}" class="btn btn-sm"
                                id="edit-permission-group">
                                <img src="{{ url('edit-icon') }}" alt="Logo">
                            </a>
                        @endif

                        @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.destroy'))
                            <form action="{{ route('permission-groups.destroy', $permissionGroup->id) }}" method="post"
                                class="d-inline delete-role-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm delete-role-button" id="delete-permission-group"
                                    title="Delete Role" data-delete-type="permissionGroup">
                                    <img src="{{ url('delete-icon') }}" alt="Logo">
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No permission groups found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    @include('roleassign::layouts.pagination', ['paginator' => $permissionGroups])
@endsection
