@extends('layouts.modal')

@section('content')
    <form id="submit" action="{{ url('/users') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-5 px-1">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-7 pl-1">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-md-7 pl-1">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
        </div>
    </form>
@endsection