@extends('layout.app')
@section('header') @parent
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="{{ asset('/') }}">{{ __('page.home') }}</a></li>
                        <li><a href="#" class="active">{{ __('page.book.edit') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="user-login-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-title text-center mb-30">
                    <h2>{{ __('page.book.edit') }}</h2>
                </div>
            </div>
            <div class="offset-lg-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                @include('layout.notification')
                <div class="billing-fields">
                    {!! Form::open([
                        'method' => 'PATCH',
                        'route' => ['books.update', $book->slug . '-' . $book->id],
                        'class' => 'form-groupt',
                        'files' => 'true'
                    ]) !!}
                    <div class="single-register">
                        {!! Form::label(
                            'title',
                            __('page.book.title'),
                            [
                                'class' => 'col-2 col-form-label',
                            ]
                        ) !!}
                        {!! Form::text(
                            'title',
                            $book->title,
                            [
                                'placeHolder' => 'Title of book ...',
                                'required' => 'required',
                                'class' => 'form-control m-input'
                            ]
                        ) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label(
                                    'author',
                                    __('page.book.author')
                                ) !!}
                                {!! Form::text(
                                    'author',
                                    $book->author,
                                    [
                                        'placeHolder' => 'Author of book ...',
                                        'required' => 'required',
                                        'class' => 'form-control m-input'
                                    ]
                                ) !!}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label(
                                    'total_pages',
                                    __('page.book.totalPage')
                                ) !!}
                                {!! Form::number(
                                    'total_pages',
                                    $book->total_pages,
                                    [
                                        'placeHolder' => 'Total pages',
                                        'required' => 'required',
                                        'class' => 'form-control m-input'
                                    ]
                                ) !!}
                            </div>
                        </div>
                    </div>
                    <div class="single-register mb-4">
                        <div class="form-group">
                            {!! Form::label('avatar', __('page.book.avatar')) !!}
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse…
                                        {!! Form::file(
                                            'avatar',
                                            [
                                                'id' => 'img-upload',
                                                'class' => 'form-control m-input',
                                                'accept' => 'image/png, image/jpg, image/jpeg, image/bmp, image/gif'
                                            ]
                                        ) !!}
                                    </span>
                                </span>
                                {!! Form::text(
                                    null,
                                    $book->medias[0]->path,
                                    [
                                        'class' => 'form-control',
                                        'disabled' => 'disabled'
                                    ]
                                ) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-push-4 single-register">
                        @if ($book->medias->count() > 0)
                            <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book">
                        @endif
                    </div>
                    <div class="both"></div>
                    <div class="single-register">
                        {!! Form::label('category', __('page.book.category')) !!}
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-md-4 mb-10" style="margin-left: 50px !important;">
                                    <label>
                                        {!! Form::checkbox(
                                            'category[]',
                                            $category->id,
                                            $checked != null && in_array($category->id, $checked)
                                        ) !!}
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label(
                                    'sku',
                                    __('page.book.sku')
                                ) !!}
                                {!! Form::text(
                                    'sku',
                                    $book->sku,
                                    [
                                        'placeHolder' => 'Sku of book ...',
                                        'disabled' => 'disabled',
                                        'class' => 'form-control m-input',
                                    ]
                                ) !!}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label(
                                    'publish_date',
                                    __('page.book.publish')
                                ) !!}
                                {!! Form::date(
                                    'publish_date',
                                    $book->publish_date,
                                    [
                                        'id' => 'example-datetime-local-input',
                                        'required' => 'required',
                                        'class' => 'form-control m-input',
                                    ]
                                ) !!}
                            </div>
                        </div>
                    </div>
                    <div class="single-register">
                        {!! Form::label(
                            'description',
                             __('page.book.description')
                        ) !!}
                        {!! Form::textarea(
                            'description',
                            $book->description,
                            [
                                'id' => 'mytextarea',
                                'class' => 'form-control m-input',
                            ]
                        ) !!}
                    </div>
                    <div class="single-register">
                        {!! Form::submit(__('page.submit'), ['class' => 'btn btn-info']) !!}
                        {!! Form::reset(__('page.cancel'), ['class' => 'btn btn-secondary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer') @parent
@endsection

@section('script')
    {!! Html::script('assets/tinymce/js/tinymce//tinymce.min.js') !!}
    {!! Html::script('assets/js/upload.js') !!}
    <script>
        jQuery(document).ready(function() {
            tinymce.init({
                selector: 'textarea#mytextarea'
            });

            $("#img-upload").change(function() {
                var val = $(this).val();
                switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                    case 'gif': case 'jpg': case 'png': case 'gif' : case 'bmp':
                        break;
                    default:
                        $(this).val('');
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Not an image!',
                        });
                        break;
                }
            });
        });
    </script>
@endsection
