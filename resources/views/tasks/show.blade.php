@extends('layouts.app')

@section('content')
    <h2>Task Details</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $task->description }}</td>
        </tr>
    </table>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
@endsection
