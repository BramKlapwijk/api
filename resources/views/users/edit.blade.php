@extends('layouts.modal')

@section('content')
    <form id="submit" action="{{ url('/users/'. $user->id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="row">
            <div class="col-md-5 px-1">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
                </div>
            </div>
            <div class="col-md-7 pl-1">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 px-1">
                <div class="form-group">
                    <label for="permissions">Permissions</label>
                    <select id="permissions" multiple name="permissions[]" style="width: 100%" class="modal_multiple_select">
                        {{--<option value="*">all</option>--}}
                        @foreach($permissions as $permission)
                            <option {{ $user->can($permission->name) ? 'selected' : '' }}>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
@endsection