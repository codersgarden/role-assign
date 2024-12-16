<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Permission Group</h1>
    
    <form action="{{ route('permission-groups.store') }}" method="post">
        @csrf
        <label for="role">Permission Group</label>
        <input type="text" id="Permission Group" name="name" placeholder="Permission Group">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
