@extends('layouts.app')

@section('content')

<h1 class="text-center">Todo list</h1>
<hr>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h3>Update form</h3>

            <form action="{{route('update.task')}}" method="post">
                @csrf

                <input type="hidden" name="the_id" value="{{$task->id}}">

                <input type="text" name="task" value="{{$task->task}}" class="form-control">

                <input type="submit" value="Update" class="btn btn-success">
            </form>
        </div>
    </div>
</div>

@endsection