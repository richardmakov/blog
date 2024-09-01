<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the name of the post']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug: ') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'placeholder' => 'Enter the slug of the post',
        'readonly',
    ]) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category: ') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">{{ __('Tags') }}</p>

    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach

    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">{{ __('Status') }}</p>

    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        {{ __('Draft') }}
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        {{ __('Published') }}
    </label>

    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="">
                
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2020/02/27/20/48/aircraft-4885805_1280.jpg"
                    alt="">
            @endisset
        </div>

    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Image that will be showed in the post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <p>{{ __('Requirements') }}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Main: ') !!}
    {{ Form::textarea('extract', null, ['class' => 'form-control']) }}

    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Body: ') !!}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}

    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
