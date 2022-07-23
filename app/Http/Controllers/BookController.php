<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::with('category')->get();
        return response()->view('admin.books.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::where('is_visible',true)->get();
        return response()->view('admin.books.create', ['data' => $data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
        'name'=>'required|string|min:3|max:50',
        'year'=>'required|numeric|digits:4',
        'language'=>'required|string|in:en,ar',
        'quantity'=>'required|integer|min:1',
        'active'=>'required|boolean',
        'image'=>'nullable|string|mimes:jpg,png|size:2048',
        'category_id'=>'required|integer|exists:categories,id'
        ]);
        if(!$validator->fails()){
            $book = new Book();
            $book->name = $request->get('name');
            $book->year = $request->get('year');
            $book->language = $request->has('language');
            $book->quantity = $request->get('quantity');
            $book->active = $request->get('active');
            $book->category_id = $request->get('category_id');
            $is_saved = $book->save();
            return response()->json(
                [
                    'message' => $is_saved ? 'Book Created Successfully' : 'Faild to Create Book'
                ],
                $is_saved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
