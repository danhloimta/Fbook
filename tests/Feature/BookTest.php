<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Eloquent\Book;
use App\Eloquent\Media;
use App\Eloquent\User;
use App\Eloquent\BookCategory;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use DatabaseMigrations;
use DatabaseTransactions;

class BookTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAuth()
    {
        // $user = factory(User::class)->create();
        $acc = User::where('id', 365)->first();
        // $acc->email = 'abcd@gmail.com';
        // dd($acc);
        // $response = $this->actingAs($acc)->post(route('login'));
        // $response->assertRedirect('/');
        $user = factory(User::class)->make();
        // dd($user);
        // $response = $this->actingAs($user)->get('/books/create');
        // $response->assertRedirect('/books/create');
        $response = $this->followingRedirects()
                ->post('/login', ['email' => 'admin@gmail.com', 'password' => '123456'])
                ->assertStatus(200);
        // $this->followingRedirects('/books/create');
        // $this->actingAs($user)->get('/admin');
        // $this
        //     ->assertSee('Login')
        //     ->type('unknown@example.org', 'email')
        //     ->type('invalid-password', 'password')
        //     ->check('remember')
        //     ->press('Login')
        //     ->seePageIs('/login')
        //     ->see('These credentials do not match our records');
    }

    // public function testLoginAdminFunction()
    // {
    //     $data = [
    //         'email' => 'admin@admin.com',
    //         'password' => '1234567',
    //     ];

    //     $login = $this->post(route('login'), $data);
    //     $login->assertRedirect(route('home'));
    // }

    // public function testCreateBook()
    // {
    //     $dataBook = [
    //         'title' => 'sachasd1',
    //         'author' => 'abcasdad',
    //         'total_pages' => 12,
    //         'publish_date' => '2018-11-11',
    //         'description' => 'asdasdasdas',
    //         'sku' => '1234123',
    //     ];
    //     $dataBook['slug'] = str_slug($dataBook['title']);
    //     // $book = Book::create($dataBook);
    //     $dataCategory = [
    //         'book_id' => 5,
    //         'category_id' => 4
    //     ];

    //     $dataImage = [
    //         'path' => 'asdasd.png',
    //         'target_type' => 'App\Eloquent\Book',
    //         'target_id' => 5,
    //     ];
    //     $response = $this->json('POST', route('book.store'), $dataBook);
    //     $response = $this->json('POST', Media::create($dataImage));
    //     // $response = $this->json('POST', BookCategory::create(), $dataBook);
    //     dd($response->content());


    //     // $category = BookCategory::create($dataCategory)->toArray();
    //     // $avatar = Media::create($dataImage)->toArray();
    //     // $this->assertTrue($book);
    //     // $response = $this->json('POST', route('book.store'), $book);
    //     // $this->assertSame($message, $response->json('message'));
    //     // $this->assertDatabaseHas('books', $book);
    //     $response->assertSuccessful();
    //     // $this->assertRedirect(route('book.index'));
    // }
}
