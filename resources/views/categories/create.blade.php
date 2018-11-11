@extends('layouts.modal')

@section('content')
    <form id="submit" action="{{ url($model->slug) }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            @foreach($fields as $field)
                <div class="col-md-5 px-1">
                    <div class="form-group">
                        <label>{{ ucfirst($field) }}</label>
                        <input type="text" name="{{ $field }}" class="form-control" placeholder="Name">
                    </div>
                </div>
            @endforeach
        </div>
    </form>
@endsection