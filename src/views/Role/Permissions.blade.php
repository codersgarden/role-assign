<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/vue3-toastify/dist/index.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container-fluid my-5">
    <div class="row justify-content-start">
        <div class="col-md-4 col-lg-6 col-xxl-7 mb-3">
            <h1 class="page-title">{{ $role->name }}</h1>
        </div>
        <div class="col-md-8 col-lg-6 col-xxl-5 mb-3">
            <a href="{{ route('roles.index') }}" class="btn btn-outline-danger float-end text-dark">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-4">
                    @foreach ($permissionGroups as $permissionGroup)
                        <div class="mb-4">
                            <strong class="card-title">{{ $permissionGroup->name }}</strong>
                            <div class="form-card mt-3">
                                <div class="d-grid gap-3" style="grid-template-columns: repeat(4, 1fr);">
                                    @foreach ($permissionGroup->permissions as $permission)
                                        <div class="form-check form-switch form-switch-md">
                                            <input class="form-check-input" type="checkbox" id="permission-{{ $permission->id }}"
                                                value="{{ $permission->id }}" {{ in_array($permission->id, $assignedPermissions) ? 'checked' : '' }}
                                                onchange="togglePermission({{ $permission->id }}, this.checked)">
                                            <span class="ms-2 text-dark text-capitalize"><b>{{ $permission->name }}</b></span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/vue3-toastify/dist/index.js"></script>

<script>
    // Retrieve the CSRF token once and store it in a variable
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function togglePermission(permissionId, checked) {
        // Show loading spinner or similar if needed

        // Prepare data to be sent
        const requestData = {
            role_id: {{ $role->id }},
            permission_id: permissionId,
            assign: checked
        };

        // Perform the fetch request
        fetch('/api/permissions/assign-or-remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(requestData)
        })
        .then(response => {
            // Check if the response is successful
            if (!response.ok) {
                throw new Error(`Error: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            // Handle response data
            if (data.status === 'assigned' || data.status === 'removed') {
                Vue3Toastify.success(data.message); // Display success toast
            } else {
                Vue3Toastify.error("Unexpected response status.");
            }
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
            Vue3Toastify.error("An error occurred while updating permission.");
        });
    }
</script>

</body>
</html>