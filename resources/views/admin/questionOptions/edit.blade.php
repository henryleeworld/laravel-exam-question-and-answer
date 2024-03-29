@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.questionOption.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.question-options.update", [$questionOption->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="required" for="question_id">{{ trans('cruds.questionOption.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ ($questionOption->question ? $questionOption->question->id : old('question_id')) == $id ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionOption.fields.question_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="option_text">{{ trans('cruds.questionOption.fields.option_text') }}</label>
                <input class="form-control {{ $errors->has('option_text') ? 'is-invalid' : '' }}" type="text" name="option_text" id="option_text" value="{{ old('option_text', $questionOption->option_text) }}" required>
                @if($errors->has('option_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('option_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionOption.fields.option_text_helper') }}</span>
            </div>
            <div class="mb-3">
                <div class="form-check {{ $errors->has('is_correct') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_correct" value="0">
                    <input class="form-check-input" type="checkbox" name="is_correct" id="is_correct" value="1" {{ $questionOption->is_correct || old('is_correct', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_correct">{{ trans('cruds.questionOption.fields.is_correct') }}</label>
                </div>
                @if($errors->has('is_correct'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_correct') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionOption.fields.is_correct_helper') }}</span>
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