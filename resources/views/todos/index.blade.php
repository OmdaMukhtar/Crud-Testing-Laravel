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
                                <li class="todo-list-item" >
                                    <span>{{ $loop->iteration }}</span>
                                    <h4 class="title">
                                        <a href="#"> {{ $todo->title }} </a>
                                    </h4>
                                    <div class="controls">
                                        @if($todo->done)
                                            <a href="#" class="btn btn-success space"><i class="fa fa-hand-peace-o"></i></a>
                                        @else
                                            <a href="#" class="btn btn-warning space"><i class="fa fa-thumbs-o-down"></i></a>
                                        @endif

                                        <button class="btn btn-danger" onclick="deleteTodo({{ $todo->id }})"><i class="fa fa-remove"></i></button>
                                        <form style="display:none" action="{{ route('todo.destroy', $todo) }}"
                                            id="frm-delete-{{ $todo->id }}" method="POST">
                                            @csrf
                                            @method('delete');
                                        </form>
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

<script>
    function deleteTodo(id){
        if(confirm('Are you sure to delete this record ?')){
            event.preventDefault();
            document.getElementById('frm-delete-'+id).submit();
        }else{
            event.preventDefault();
        }
    }
</script>
