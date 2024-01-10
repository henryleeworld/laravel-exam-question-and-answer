@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.questionOption.title') }}
    </div>

    <div class="card-body">
        <div class="mb-3">
            <div class="mb-3">
                <a class="btn btn-light" href="{{ route('admin.question-options.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.id') }}
                        </th>
                        <td>
                            {{ $questionOption->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.question') }}
                        </th>
                        <td>
                            {{ $questionOption->question->question ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.option_text') }}
                        </th>
                        <td>
                            {{ $questionOption->option_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.is_correct') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $questionOption->is_correct ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mb-0">
                <a class="btn btn-light" href="{{ route('admin.question-options.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection