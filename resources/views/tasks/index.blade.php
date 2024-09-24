<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Task</title>
    <x-app-layout>
    </x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .min-h-screen{
        min-height: 10px;
    }
    body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    margin: 0;
    padding: 20px;
}

h1 {
    color: #333;
    text-align: center;
    size: 10px;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}
select{
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>

<body>
    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'team_lead')
    <form action="/tasks/assign" method="POST">
        @csrf

        <label for="title">Choose a Task:</label>
        <select name="title" id="title" required>
            <option value="">-- Select a Task --</option>
            @foreach ($tasks as $key => $data)
                <option value="{{ $data['tasks'] }}">{{ $data['tasks'] }}</option>
            @endforeach
        </select>

        <label for="assigned_to">Assigned To:</label>
        <select name="assigned_to" id="assigned_to" required>
            <option value="">-- Select to --</option>
            @foreach ($usersList as $key => $data)
                <option value="{{ $data['email'] }}">{{ $data['name'] }}</option>
            @endforeach
        </select>

        <label for="status">Select a Status:</label>
        <select name="status" id="status" required>
            <option value="">-- Select a Status --</option>
            <option value="pending">Pending</option>
            <option value="inprogress">In Progress</option>
            <option value="done">Done</option>
            <option value="close">Close</option>
           
        </select>

        <label for="description">Description :</label>
        <input type="text" name="description" required>

        <input type="submit" value="Submit">
    </form>
    @endif

    @if(Auth::user()->role == 'employee')
    <h2>employee</h2>
    @endif

    @if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif


<div class="container mt-5">
    <h1>Task List</h1>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Assigned By</th>
                <th>Assigend to</th>
                <th>Status</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignedTaskLists as $task)
    
                <tr>
                    <td>{{ $count++}}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->assigned_by }}</td>
                    <td>{{ $task->assigned_to }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    

</body>

</html>