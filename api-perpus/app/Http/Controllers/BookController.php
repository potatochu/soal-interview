<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json(['books' => $books], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book = Book::create($validatedData);
        return response()->json(['book' => $book], 201);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json(['book' => $book], 200);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book->update($validatedData);
        return response()->json(['book' => $book], 200);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }

    public function borrowBook(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $book = Book::findOrFail($id);

        // Cek apakah buku tersedia untuk dipinjam
        if ($book->is_available) {
            $borrowDate = Carbon::now();
            $returnDate = $borrowDate->copy()->addDays(7); // Contoh: peminjaman selama 7 hari

            $borrowInfo = [
                'book_id' => $book->id,
                'user_id' => $request->user_id,
                'borrow_date' => $borrowDate,
                'return_date' => $returnDate
            ];

            BookUser::create($borrowInfo);

            return response()->json(['message' => 'Book borrowed successfully'], 200);
        } else {
            return response()->json(['message' => 'Book is not available for borrowing'], 400);
        }
    }

    public function returnBook($id)
    {
        $borrowInfo = BookUser::where('book_id', $id)->whereNull('return_date')->first();

        if ($borrowInfo) {
            $borrowInfo->update(['return_date' => Carbon::now()]);
            return response()->json(['message' => 'Book returned successfully'], 200);
        } else {
            return response()->json(['message' => 'Book is not borrowed or already returned'], 400);
        }
    }
}
