<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Role Assign</h1>
    
    <form action="{{ route('roles.store') }}" method="post">
        @csrf
        <label for="role">Role</label>
        <input type="text" id="role" name="name" placeholder="Role">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
