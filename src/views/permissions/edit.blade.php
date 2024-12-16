<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Permission</title>
</head>
<body>
    <h1>Edit Permission</h1>
    
    <form action="{{ route('permissions.update', $permission->id) }}" method="post">
        @csrf
        
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name"  value="{{ old('name', $permission->name) }}" >
        </div>
        
        <div>
            <label for="permission_group_id">Permission Group</label>
            <select name="permission_group_id" id="permission_group_id" class="form-select" required>
                <option value="">Select Permission Group</option>
                @foreach ($permissionGroups as $permissionGroup)
                    <option value="{{ $permissionGroup->id }}" {{ $permissionGroup->id == $permission->permission_group_id ? 'selected' : '' }}>
                        {{ $permissionGroup->name }}
                    </option>
                @endforeach
            </select>
           
        </div>

        <div>
            <label for="route">Route</label>
            <input type="text" id="route" name="route" class="form-control" value="{{ old('route', $permission->route) }}" placeholder="Enter Route">
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
