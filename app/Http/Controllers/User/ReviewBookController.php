<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReviewBookRepository;
use Illuminate\Http\Request;
use App\Repositories\Contracts\BookRepository;
use Auth;

class ReviewBookController extends Controller
{
    protected $review;

    protected $book;

    public function __construct(ReviewBookRepository $review, BookRepository $book) {
        $this->review = $review;
        $this->book = $book;
    }

    public function index($param)
    {
        $id = (int)last(explode('-', $param));
        $book = $this->book->find($id);

        $reviews = $this->review->show($id);

        return view('book.review', compact('book', 'reviews'));
    }

    public function update(Request $request, $param)
    {
        $id = (int)last(explode('-', $param));
        $request->merge(['book_id' => $id]);
        $this->review->store($request->all());
        return back();
    }

}
