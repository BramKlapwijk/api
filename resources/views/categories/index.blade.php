@extends('layouts.portal')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $model->name }} Table
                    @if(auth()->user()->can('create '. $model->slug))
                        <a href="{{ url($model->slug.'/create') }}" data-toggle="modal"><i class="float-right now-ui-icons ui-1_simple-add"></i></a>
                    @endif
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(!empty($data->first()))
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                @foreach(optional($data->first())->toArray() as $key => $field)
                                    <th>{{ $key }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $record)
                                <tr>
                                    @foreach($record->toArray() as $field)
                                        <td>{{ $field }}</td>
                                    @endforeach
                                    @if(auth()->user()->can('edit '. $model->slug))
                                        <td>
                                            <a href="{{ url($model->slug.'/'.$record->id .'/edit') }}" data-toggle="modal"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                        </td>
                                    @endif
                                    @if(auth()->user()->can('delete '. $model->slug))
                                        <td>
                                            <a href="{{ url($model->slug.'/'.$record->id) }}" data-toggle="delete" data-token="{{ csrf_token() }}"><i class="now-ui-icons ui-1_simple-remove"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop