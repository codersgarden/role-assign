<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Navbar styles */
        .navbar-custom {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand img {
            height: 40px;
        }

        .nav-link {
            color: #6c757d;
            font-weight: 500;
        }

        .nav-link.active {
            color: #000;
            font-weight: bold;
        }

        /* Table and general styles */
        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ddd;
            background: #fff;
        }

        .table thead th {
            background-color: #ffffff;
            font-weight:400;
            color: #000;
            font-size: 14px;
            border-bottom: 1px solid #E8E8E8;
            text-transform: uppercase;
            opacity: 0.5;
        }

        .table tbody tr td {
            vertical-align: middle;
            background-color: #EDEDF3;
            color: #000;
            font-size: 18px;
            font-weight: 400;
            font-family: jost,sans-serif;
        }

        /* Pagination */
        .pagination {
            justify-content: center;
        }

        /* vertical line */

        .vl {
            border-left: 5px solid #ddd;
            height: 50px;
        }

        .nav-item a {
            font-weight: 400;
            font-size: 18px;
            font-family: "Jost", sans-serif;
            /* Always use quotes for font names and add a fallback */
            color: #000;
            text-decoration: none;
            /* Ensure links don't have default underlines */
        }

        .nav-item a.active {
            font-weight: 600;
            text-decoration: underline;
            /* Correct the `text-underline` property */
            color: #000;
            /* Keep the same color for active links */
        }

        .bg-color{
            background-color: #EDEDF3;
        }

        .br-11{
            border-radius: 12px;
        }

        .title{
            font-weight: 500;
            font-size: 28px;
            font-family: jost,sans-serif;s
        }

        .new_roles{
            color: #fff;
            font-weight: 500;
            font-size: 14px;
        }


    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid d-flex justify-content-between">
            <!-- Logo and Back Button -->
            <div class="d-flex align-items-left col-lg-4 v1">
                <a class="navbar-brand" href="#">
                    <img src="E:\www\html\Testing Project\RoleAssignPackage\Pkg\package\roleassign\image\LOGO.svg"
                        alt="Logo">
                </a>
                <div class="vl"></div>
            </div>
            <!-- Navigation Links -->
            <div class="d-flex align-items-center col-lg-8 nav-item">
                <a class="nav-link me-4 active" href={{ route('roles.index') }}>Roles</a>
                <a class="nav-link me-4" href={{ route('permissions.index') }}>Permissions</a>
                <a class="nav-link me-4" href={{ route('permission-groups.index') }}>Permission Group</a>
            </div>
    </nav>


    <div class="container-fluid bg-color">
        <div class="d-flex justify-content-between align-items-center p-2">
            <p class="title pt-3">Roles</p>
            <a href="{{ route('roles.create') }}" class=" br-11 new_roles btn btn-dark">Add New Roles</a>
            
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">

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

                                <div class="gap-2">
                                    {{-- @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.edit')) --}}
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm"
                                        id="roleEditButton" title="Edit Role">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- @endif
        
                                @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.destroy')) --}}
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" id="roleDeleteButton"
                                            title="Delete Role" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- @endif
        
                                @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.permissions')) --}}
                                    <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-sm"
                                        id="rolePermissionButton" title="Manage Permissions">
                                        <i class="fas fa-key"></i>
                                    </a>
                                    {{-- @endif --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center fw-bold text-muted">No roles found.</td>
                        </tr>
                    @endforelse
                </tbody>

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
