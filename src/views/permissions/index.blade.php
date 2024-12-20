@php
    // Define the list of authorized emails (this could also be passed from the controller)
    $aclEmails = explode(',', config('custom.acl_users'));
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permission</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="js/general.js"></script>
</head>

<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Permission Table</h1>

            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.create'))
                <a href="{{ route('permissions.create') }}" class="btn btn-primary" id="createPermissionButton">
                    <i class="fas fa-plus-circle me-2"></i>Create Permission
                </a>
            @endif

        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
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
                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.edit'))
                                <a href="{{ route('permissions.edit', $permission->id) }}" 
                                   class="btn btn-sm btn-warning me-2" id="editPermissionButton">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif

                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permissions.destroy'))
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Are you sure?')" id="deletePermissionButton">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
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
</body>

</html>
