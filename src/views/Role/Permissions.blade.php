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

    <div class="container mt-5">
        <!-- Header Section -->
        <div class="row justify-content-between align-items-center mb-4 m-3">
            <div class="col-md-6">
                <h1 class="page-title text-black">{{ $role->name }}</h1>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('roles.index') }}" class="btn btn-outline-danger">Back</a>
            </div>
        </div>
    
        <!-- Permissions Assignment Section -->
        <div class="w-100 mx-auto p-4 rounded">
            @foreach ($permissionGroups as $permissionGroup)
                <div class="mb-4">
                    <!-- Permission Group Title -->
                    <h3 class="text-secondary border-bottom pb-2 mb-3">{{ $permissionGroup->name }}</h3>
    
                    <!-- Permission Items -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                        @foreach ($permissionGroup->permissions as $permission)
                            <div class="col">
                                <div class="form-check form-switch d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="permission-{{ $permission->id }}"
                                        value="{{ $permission->id }}" {{ in_array($permission->id, $assignedPermissions) ? 'checked' : '' }}
                                        onchange="togglePermission({{ $permission->id }}, this.checked)">
                                    <label for="permission-{{ $permission->id }}" class="form-check-label ms-2 text-dark">
                                        <b>{{ $permission->name }}</b>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
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
