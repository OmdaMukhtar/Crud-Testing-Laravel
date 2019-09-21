@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="justify-content:center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update todo
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.update', $todo) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            name="title"
                                            value="{{ $todo->title }}" />
                                    </div>
                                </div>
                            </div>
                            <a  class="btn btn-primary" href="{{ route('todo.index') }}"><i class="fa fa-chevron-left"></i></a>
                            <button type="submit" class="btn btn-warning">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
