@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todo List </div>    
                    <div class="card-body">
                        <ul>
                            @foreach ($todos as $todo)
                                <li>{{ $todo->title }} {{ $todo->done }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>    
            </div>
        </div>    
    </div>    
@endsection