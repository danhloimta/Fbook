@extends('layout.app')

@section('header')
    @parent
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">{{ trans('settings.default.home') }}</a></li>
                            <li><a href="#" class="active">{{ trans('settings.header.notifications.name') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="entry-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entry-header-title">
                        <h2>{{ trans('settings.header.notifications.name') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="cart-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="suggestion">
                <ul class="suggestions-list">
                    @if (isset($notifications) && count($notifications) > 0)
                        @foreach ($notifications as $item)
                            @if ($item->route)
                                <li class="result-entry {{ $item->viewed == 0 ? 'new' : 'old' }}" data-suggestion="#" data-position="1" data-type="type" data-analytics-type="merchant">
                                    <a href="{{ route($item->route, $item->link) }}" class="result-link" title="{{ $item->message }}">
                                        <div class="media single-noti">
                                            <div>
                                                @if ($item->userSend->avatar)
                                                    <img src="{{ $item->userSend->avatar }}" alt="item" class="media-object mg-thumbnail avatar-icon" />
                                                @else
                                                    <img src="{{ asset(config('view.image_paths.user') . 'default.jpg') }}" alt="woman" class="media-object mg-thumbnail avatar-icon" />
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{ $item->userSend->name }}</h4>
                                                {{ $item->message }}
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li class="result-entry text-center" data-suggestion="#" data-position="1" data-type="type" data-analytics-type="merchant">
                            <div class="media-body">
                                {{ $notifications->links() }}
                            </div>
                        </li>
                    @else
                        <li class="result-entry text-center" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                            <div class="media-body">
                                <a>
                                    {{ trans('settings.home.not_found') }}
                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @parent
@endsection
