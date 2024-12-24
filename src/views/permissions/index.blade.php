@extends('roleassign::layouts.app')

@section('content')
    <div class="content bg-color">
        <div class="d-flex justify-content-between align-items-center ms-5 me-5">
            <p class="title pt-3">Permissions</p>

            {{-- @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.create')) --}}
            <a href="{{ route('permissions.create') }}" class=" br-11 new_roles btn btn-dark">Add New Permission</a>

            {{-- @endif --}}
        </div>
    </div>
    <div class="text-center">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Route</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->route }}</td>
                        <td>
                            {{-- @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.edit')) --}}
                            <a href="{{ route('permissions.edit', $permission->id) }}"  class="btn btn-sm"
                                id="editPermissionButton">
                                <img src="{{ url('edit-icon') }}" alt="Logo">
                            </a>
                            {{-- @endif

                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.destroy')) --}}
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-sm" id="deletePermissionButton" title="Delete Permission"
                                    onclick="return confirm('Are you sure?')">
                                    <img src="{{ url('delete-icon') }}" alt="Logo">
                                </button>
                            </form>
                            {{-- @endif --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No permissions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('roleassign::layouts.pagination', ['paginator' => $permissions])
@endsection
