<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Permission</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Create Permission</h1>

        <form action="{{ route('permissions.store') }}" method="post" class="w-50 mx-auto p-4 rounded">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" id="name" name="name" placeholder="Role Name" class="form-control">

                <label for="permission_group_id" class="form-label mt-2">Permission Group</label>
                <select name="permission_group_id" id="permission_group_id" class="form-select">
                    <option value="">Select Permission Group</option>
                    @foreach ($permissionGroups as $permissionGroup)
                        <option value="{{ $permissionGroup->id }}">
                            {{ $permissionGroup->name }}
                        </option>
                    @endforeach
                </select>


                <label for="route" class="form-label mt-2">Route</label>
                <input type="text" id="route" name="route" placeholder="Route" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>

    </div>
</body>

</html>
