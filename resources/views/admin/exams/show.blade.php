@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.exam.title') }}
    </div>

    <div class="card-body">
        <div class="mb-3">
            <div class="mb-3">
                <a class="btn btn-light" href="{{ route('admin.exams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.id') }}
                        </th>
                        <td>
                            {{ $exam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.name') }}
                        </th>
                        <td>
                            {{ $exam->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.questions_amount') }}
                        </th>
                        <td>
                            {{ $exam->questions_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.categories') }}
                        </th>
                        <td>
                            @foreach($exam->categories as $key => $categories)
                                <span class="label label-info">{{ $categories->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mb-0">
                <a class="btn btn-light" href="{{ route('admin.exams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection