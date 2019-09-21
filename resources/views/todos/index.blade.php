@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header todo-header">
                        <h3 class="title">Todo List</h3>
                        <a class="btn btn-primary" href="{{ route('todo.create') }}">Create</a>
                    </div>
                    <div class="card-body">
                        <ul class="todo-list">
                            @foreach ($todos as $todo)
                                <li class="todo-list-item">
                                    <span>{{ $loop->iteration }}</span>
                                    <h4 class="title">
                                        <a href="#"> {{ $todo->title }} </a>
                                    </h4>
                                    <div>
                                        @if($todo->done)
                                            <a href="#" class="btn btn-success"><i class="fa fa-hand-peace-o"></i></a>
                                        @else
                                            <a href="#" class="btn btn-warning"><i class="fa fa-thumbs-o-down"></i></a>
                                        @endif
                                        <a href="#" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

