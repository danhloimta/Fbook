@if(isset($latestBook) && !empty($latestBook))
    @for($i = 0; $i < count($latestBook) - 1; $i++)
        <div class="tab-total">
            <div class="product-wrapper mb-40">
                <div class="product-img">
                    @if($latestBook[$i]->medias->count() > 0)
                        <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . $latestBook[$i]->medias[0]->path) }}" alt="book" class="primary" />
                        </a>
                    @else
                       <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                        </a>
                    @endif
                    <div class="quick-view">
                        <a class="action-view" href="#" data-target="#productModal{{ $latestBook[$i]->id }}" data-toggle="modal" title="Quick View">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="product-details text-center">
                    <div class="product-rating">
                        <ul>
                            @for ($k = 1; $k < $latestBook[$i]->avg_star; $k++)
                                <li><i class="fa fa-star"></i></li>
                            @endfor

                            @if (strpos($latestBook[$i]->avg_star, '.'))
                                <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                @php $k++ @endphp
                            @endif

                            @while ($k <= 5)
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                @php $k++ @endphp
                            @endwhile
                        </ul>
                    </div>
                    <h4><a href="{{ '/books/' . $latestBook[$i]->slug . '-' . $latestBook[$i]->id }}">{{ $latestBook[$i]->title }}</a></h4>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    @if ($latestBook[++$i]->medias->count() > 0)
                        <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . $latestBook[$i]->medias[0]->path) }}" alt="book" class="primary" />
                        </a>
                    @else
                        <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                        </a>
                    @endif
                    <div class="quick-view">
                        <a class="action-view" href="#" data-target="#productModal{{ $latestBook[$i]->id }}" data-toggle="modal" title="Quick View">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="product-details text-center">
                    <div class="product-rating">
                        <ul>
                            @for ($a = 0; $a < $latestBook[$i]->avg_star; $a++)
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            @endfor
                            @for ($j = 0; $j < 5 - $latestBook[$i]->avg_star; $j++)
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            @endfor
                        </ul>
                    </div>
                    <h4><a href="{{ '/books/' . $latestBook[$i]->slug . '-' . $latestBook[$i]->id }}">{{ $latestBook[$i]->title }}</a></h4>
                </div>
            </div>
        </div>
    @endfor
@endif
