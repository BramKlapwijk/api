@extends('layouts.app')

@section('content')
    <div class="card m-5">
        <div class="card-header">
            Dashboard
            <button id="req_token" class="float-right btn btn-success">Request API token</button>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <textarea id="token" readonly>{{ optional(auth()->user()->apiToken)->token }}</textarea>
            You are logged in!
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#req_token').click(function () {
            $.post('/token', {_token: `{{ csrf_token() }}`}, function (data) {
                $('#token').html(data.token)
            });
        })
    </script>
@stop
