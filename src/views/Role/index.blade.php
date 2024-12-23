<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="{{ url('style-css') }}" rel="stylesheet">
<style>


.navbar-custom {
  background-color: #fff !important;
  border-bottom: 1px solid #ddd !important;
  padding: 20px 0 !important;
}

.navbar-brand img {
  height: 20px !important;
}

.nav-link {
  color: #6c757d;
  font-weight: 500;
  text-decoration: none;
  font-family: "Jost", sans-serif;
  font-size: 18px;
}

.nav-link.active {
  font-weight: 600;
  color: #000;
  text-decoration: underline;
  text-decoration-thickness: 2px;
  text-underline-offset: 12px;
  /* Adds space between text and underline */
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
  font-weight: 400;
  color: #000;
  font-size: 14px;
  border-bottom: 1px solid #e8e8e8;
  text-transform: uppercase;
  opacity: 0.5;
  padding: 15px 0px;
}

.table tbody tr td {
  background-color: #ededf3;
  color: #000;
  font-size: 16px;
  font-weight: 400;
  font-family: jost, sans-serif;
  padding: 15px 0px;
}

.pagination {
  justify-content: center;
}

.vl {
  border-left: 5px solid #ddd;
  height: 50px;
}

.nav-item a {
  font-weight: 400;
  font-size: 18px;
  font-family: "Jost", sans-serif;
  color: #000;
  text-decoration: none;
}

.nav-item a.active {
  font-weight: 600;
  text-decoration: underline;
  color: #000;
  text-decoration-thickness: 2px;
}

.bg-color {
  background-color: #ededf3;
}

.br-11 {
  border-radius: 12px;
}

.title {
  font-weight: 500;
  font-size: 28px;
  font-family: jost, sans-serif;
}

.new_roles {
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
            <div class="d-flex align-items-left col-3 v1">
                <a class="navbar-brand ms-3" href="#">
                    <img src="{{ url('roleassign-logo') }}" alt="Logo">
                </a>
                <div class="vl"></div>
            </div>
            <!-- Navigation Links -->
            <div class="d-flex align-items-left col-9 nav-item">
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
            <table class="table text-center">
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


                                {{-- @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.edit')) --}}
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm" id="roleEditButton"
                                    title="Edit Role">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- @endif
        
                                @if (in_array(Auth::user()->email, $aclEmails) || checkPermission('roles.destroy')) --}}
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" id="roleDeleteButton" title="Delete Role"
                                        onclick="return confirm('Are you sure?')">
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
