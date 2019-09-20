@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todo List </div>
                    <div class="card-body">
                        <ul class="todo-list">
                            @foreach ($todos as $todo)
                                <li class="todo-list-item">
                                    <span>{{ $loop->iteration }}</span>
                                    <h4 class="title">
                                        <a href="#"> {{ $todo->title }} </a>
                                    </h4>
                                    <span>{{ $todo->done }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

