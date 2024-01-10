@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="required" for="category_id">{{ trans('cruds.question.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.category_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="question">{{ trans('cruds.question.fields.question') }}</label>
                <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text" name="question" id="question" value="{{ old('question', '') }}" required>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="points">{{ trans('cruds.question.fields.points') }}</label>
                <input class="form-control {{ $errors->has('points') ? 'is-invalid' : '' }}" type="number" name="points" id="points" value="{{ old('points', '1') }}" step="1">
                @if($errors->has('points'))
                    <div class="invalid-feedback">
                        {{ $errors->first('points') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.points_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="answer_explanation">{{ trans('cruds.question.fields.answer_explanation') }}</label>
                <input class="form-control {{ $errors->has('answer_explanation') ? 'is-invalid' : '' }}" type="text" name="answer_explanation" id="answer_explanation" value="{{ old('answer_explanation', '') }}">
                @if($errors->has('answer_explanation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer_explanation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.answer_explanation_helper') }}</span>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.questionOption.title') }}
                </div>

                <div class="card-body">
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-success add-option">
                                {{ trans('global.add') }} {{ trans('cruds.questionOption.title_singular') }}
                            </button>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-hover options">
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.questionOption.fields.option_text') }}
                                </th>
                                <th>
                                    {{ trans('cruds.questionOption.fields.is_correct') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(old('option_text', ['']) as $key => $questionOption)
                                <tr>
                                    <td>
                                        <input
                                            class="form-control{{ $errors->has('option_text' . $key) ? 'is-invalid' : '' }}"
                                            type="text"
                                            name="option_text[{{ $loop->index }}]"
                                            value="{{ $questionOption }}"
                                            required
                                        >
                                    </td>
                                    <td>
                                        <input type="checkbox" name="is_correct[{{ $loop->index }}]" value="1" {{ old('is_correct.' . $key) ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger delete-option">
                                            {{ trans('global.delete') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mb-0">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
$(function () {
    let $options = $('table.options tbody');
    let index = $options.find('tr').length;

    $('.add-option').click(function (e) {
        e.preventDefault();
        if ($options.find('tr:last input[type="text"]').val()) {
            let $newRow = $options.find('tr:last').clone();
            $newRow.find('td input[type="text"]').prop({
                value: '',
                name: 'option_text[' + index + ']'
            });
            $newRow.find('td input[type="checkbox"]').prop({
                checked: false,
                name: 'is_correct[' + index + ']'
            });
            index++;
            $newRow.appendTo($options);
        }
    });

    $options.on('click', '.delete-option', function (e) {
        e.preventDefault();
        if ($options.find('tr').length > 1) {
            $(this).closest('tr').remove();
        }
    });
});
</script>
@endsection
