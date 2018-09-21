<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Review;
use App\Repositories\Contracts\ReviewBookRepository;

class ReviewBookEloquentRepository extends AbstractEloquentRepository implements ReviewBookRepository
{
    public function model()
    {
        return new Review;
    }

    public function store($data = [])
    {
        $data['user_id'] = 1;

        return $this->model()->create($data);
    }

    public function show($data = []){
        $review = Review::where('book_id', '=', $data)
            ->orderBy('created_at', 'desc')
            ->take(config('view.taking_numb.review'))
            ->get();

        return $review;
    }

    public function find($id)
    {
        return $this->model()->findOrFail($id)->get();
    }
}
