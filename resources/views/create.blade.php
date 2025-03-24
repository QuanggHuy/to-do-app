    @extends('layouts.app')

    @section('style')
        .alert-danger {
            color: red;
        }
    @endsection

    @section('title','Create Task')
    @section('content')
    <form action="{{route('tasks.create')}}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        <label for="long_description">Long_Description</label>
        <input type="text" name="long_description" id="long_description">
        <button type="submit">Create</button>
    </form>
    @endsection