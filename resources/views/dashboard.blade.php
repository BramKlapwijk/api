@extends('layouts.portal')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Dashboard
                @if(!optional(auth()->user()->apiToken)->token)
                    <button id="req_token" class="float-right btn btn-success">Request API token</button>
                @endif
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <textarea id="token" class="form-control" readonly>{{ optional(auth()->user()->apiToken)->token }}</textarea>
                You are logged in!
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#req_token').click(function () {
            $.post('/token', {
                _token: `{{ csrf_token() }}`
            }, function (data) {
                notification('success', 'Token was supplied');
                $('#token').html(data.token);
                $(this).attr('disabled', 'disabled')
            });
        })
    </script>
@stop
