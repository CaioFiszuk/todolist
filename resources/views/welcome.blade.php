@extends('layouts.app')

@php
 use App\Classes\HideId;   
@endphp

@section('content')
    @include('includes.modal')

    <h1 class="text-center">Todo list</h1>

    <!--Modal button to insert data in database-->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#window">Add a task</button>

    <!--Search Field-->
    <form action="{{route('search')}}" method="get" class="d-flex float-end">
        <input type="search" name="q" class="form-control me-2">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    <hr>

    <!--Table-->
    @if ($tasks->count()>0)
    <table class="table">
        <thead>
            <tr>
                <th>Task</th>
                <th>Situation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->task}}</td>

                    <td>
                        @if ($task->done==false)
                            <a href="{{route('done', ['id'=>HideId::hide($task->id)])}}" class="btn btn-danger"><i class="fa-solid fa-x"></i></a>
                        @else
                            <a href="{{route('undone', ['id'=>HideId::hide($task->id)])}}" class="btn btn-success"><i class="fa-solid fa-thumbs-up"></i></a>
                        @endif
                    </td>

                    <td><a href="{{route('update.page', ['id'=>HideId::hide($task->id)])}}" class="btn btn-success"><i class="fa-solid fa-pen"></i></a></td>

                    <td><a href="{{route('delete.task', ['id'=>HideId::hide($task->id)])}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="text-center">There are no tasks to do</p>
    @endif

    <!--Errors-->
    @if ($errors->any())
    @foreach ($errors->all() as $error)
      <ul>
        <li class="alert alert-danger">{{$error}}</li>
      </ul>
    @endforeach
   @endif

    <!--Pagination-->
    @if($tasks->count()>=10)
    {{$tasks->links()}}
    @endif
    
@endsection