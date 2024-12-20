@php
    // Define the list of authorized emails (this could also be passed from the controller)
    $aclConfig = config('custom.acl_users');

        // Ensure ACL_USERS is treated as an array
        $aclEmails = is_array($aclConfig)
            ? $aclConfig
            : array_map(
                function ($email) {
                    return trim($email, "'\"");
                },
                explode(',', trim($aclConfig, "[]"))
            );
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permission Group</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="js/general.js"></script>
</head>
<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Permission Group Table</h1>

            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.create'))
            <a href="{{ route('permission-groups.create') }}" class="btn btn-primary" id="add-permission-group">
                <i class="fas fa-plus-circle me-2"></i> Create Permission Group
            </a>
            @endif
        </div>
        
        <table class="table table-bordered table-hover">
            <thead class="table-light">
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
                            <a href="{{ route('permission-groups.edit', $permissionGroup->id) }}" class="btn btn-sm btn-warning me-2" id="edit-permission-group">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endif

                            @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('permission-groups.destroy'))
                            <form action="{{ route('permission-groups.destroy', $permissionGroup->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" id="delete-permission-group">
                                    <i class="fas fa-trash-alt"></i>
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
</body>
</html>
