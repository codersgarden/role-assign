<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Permission Group</title>
</head>
<body>
    <h1>Edit Permission Group</h1>
    
    <form action="{{ route('permission-groups.update', $permissionGroup->id) }}" method="post">
        @csrf
        <label for="permissionGroup">Permission Group</label>
        <input type="text" id="permissionGroup" name="name" value="{{ old('name', $permissionGroup->name) }}" placeholder="permissionGroup">
        <button type="submit">Update</button>
    </form>
</body>
</html>
