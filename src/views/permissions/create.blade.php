<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permission</title>
</head>
<body>
    <h1>Permission</h1>
    
    <form action="{{ route('permissions.store') }}" method="post">
        @csrf
        
        <div>
            <label for="name">Role Name</label>
            <input type="text" id="name" name="name" placeholder="Role Name">
        </div>
        
        <div>
            <label for="permission_group_id">Permission Group</label>
            <select name="permission_group_id" id="permission_group_id">
                <option value="">Select Permission Group</option>
                @foreach ($permissionGroups as $permissionGroup)
                    <option value="{{ $permissionGroup->id }}">
                        {{ $permissionGroup->name }}
                    </option>
                @endforeach
            </select>
           
        </div>

        <div>
            <label for="route">Route</label>
            <input type="text" id="route" name="route" placeholder="Route">
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
