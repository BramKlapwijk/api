@extends('layouts.modal')

@section('content')
    <form id="submit" action="{{ url($model->slug .'/'. $id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="row">
            @foreach($record->toArray() as $key => $value)
                <div class="col-md-5 px-1">
                    <div class="form-group">
                        <label>{{ ucfirst($key) }}</label>
                        <input type="text" name="{{ $key }}" class="form-control" placeholder="{{ ucfirst($key) }}" value="{{ $value }}">
                    </div>
                </div>
            @endforeach
        </div>
    </form>
@endsection