<div class="width-50p">
    <div class="form-group form-float form-group-lg">
        <div class="form-line @if ($errors->has('name')) error @endif">
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::label('name', 'Название', ['class' => 'form-label']) }}
        </div>
        @if ($errors->has('name')) <div class="error-message">{{ $errors->first('name')}}</div> @endif
    </div>
</div>
<div class="width-50p">
    <div class="form-group form-float form-group-lg">
        <div class="form-line">
            {{ Form::text('weight', null, ['class' => 'form-control']) }}
            {{ Form::label('weight', 'Вес', ['class' => 'form-label']) }}
        </div>
    </div>
</div>
<div class="width-50p">
    <div class="form-group form-float form-group-lg">
        <div class="form-line @if ($errors->has('price')) error @endif">
            {{ Form::text('price', null, ['class' => 'form-control']) }}
            {{ Form::label('price', 'Цена', ['class' => 'form-label']) }}
        </div>
        @if ($errors->has('price')) <div class="error-message">{{ $errors->first('price')}}</div> @endif
    </div>
</div>
<div class="width-50p select-fix">
    @if (isset($cake))
        {{  Form::select('category', $categoryIdValue, $cake->category_id,
            ['class' => 'form-control show-tick category-select'])
        }}
    @else
        {{  Form::select('category', $categoryIdValue,
            ['class' => 'form-control show-tick category-select'],
            ['placeholder' => 'Категория'])
        }}
    @endif
</div>
<h2>Описание</h2>
{{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'ckeditor']) }}

