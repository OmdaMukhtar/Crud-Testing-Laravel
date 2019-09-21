@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="justify-content:center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Show todo
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>{{ $todo->title }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> Create at : {{ $todo->created_at->diffForHumans() }}</span><br>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> Update at : {{ $todo->updated_at->diffForHumans() }}</span>
                        </div>
                        <hr/>
                        <a  class="btn btn-primary" href="{{ route('todo.index') }}"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
