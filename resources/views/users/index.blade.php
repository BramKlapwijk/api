@extends('layouts.portal')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> User Table<a href="{{ url('/users/create') }}" data-toggle="modal" ><i class="float-right now-ui-icons ui-1_simple-add"></i></a></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Token</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ optional($user->apiToken)->token }}</td>
                                <td><a href="{{ url('/users/'. $user->id .'/edit') }}" data-toggle="modal"><i class="now-ui-icons ui-2_settings-90"></i></a></td>
                                <td><a href="{{ url('/users/'. $user->id) }}" data-toggle="delete" data-token="{{ csrf_token() }}"><i class="now-ui-icons ui-1_simple-remove"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop