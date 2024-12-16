<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Role</title>
</head>
<body>
    <h1>Edit Role</h1>
    
    <form action="{{ route('roles.update', $role->id) }}" method="post">
        @csrf
        <label for="role">Role</label>
        <input type="text" id="role" name="name" value="{{ old('name', $role->name) }}" placeholder="Role">
        <button type="submit">Update</button>
    </form>
</body>
</html>
