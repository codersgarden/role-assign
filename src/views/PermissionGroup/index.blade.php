@extends('roleassign::layouts.app')

@section('content')



    <div class="content bg-color">
        <div class="d-flex justify-content-between align-items-center ms-5 me-5">
            <p class="title pt-3">Permission Group</p>

            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.create'))
            <a href="{{ route('permission-groups.create') }}" class=" br-11 new_roles btn btn-dark">Add New Permission
                Group</a>

            @endif
        </div>
    </div>



    <div class="text-center">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissionGroups as $permissionGroup)
                    <tr>
                        <td>{{ $permissionGroup->id }}</td>
                        <td>{{ $permissionGroup->name }}</td>
                        <td>{{ $permissionGroup->slug }}</td>
                        <td>
                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.edit'))
                            <a href="{{ route('permission-groups.edit', $permissionGroup->id) }}"
                                class="btn btn-sm" id="edit-permission-group">
                                <img src="{{ url('edit-icon') }}" alt="Logo">
                            </a>
                            @endif

                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.destroy'))
                            <form action="{{ route('permission-groups.destroy', $permissionGroup->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm"
                                    onclick="return confirm('Are you sure?')" id="delete-permission-group">
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
    </div>

    @include('roleassign::layouts.pagination', ['paginator' => $permissionGroups])
@endsection