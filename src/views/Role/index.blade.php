<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Role Table</h1>

            @if (checkPermission('roles.create'))
            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Create Role
            </a>
            @endif

        </div>

        <table class="table table-bordered table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td class="text-center">{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                @if (checkPermission('roles.edit'))
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning" id="roleEditButton"
                                    title="Edit Role">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endif
        
                                @if (checkPermission('roles.destroy'))
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" id="roleDeleteButton"
                                        title="Delete Role" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
        
                                @if (checkPermission('roles.permissions'))
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-sm btn-info"
                                    id="rolePermissionButton" title="Manage Permissions">
                                    <i class="fas fa-key"></i>
                                </a>
                                @endif
                            </div>
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

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
