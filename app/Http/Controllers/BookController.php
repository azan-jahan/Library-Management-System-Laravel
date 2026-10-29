<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssuedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    protected function checkAdminAuth()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function index()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        return view('books.create');
    }

    public function store(Request $request)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $request->validate([
            'title' => 'required',
            'author' => 'required|regex:/^[a-zA-Z\s]+$/',
            'category' => 'required|regex:/^[a-zA-Z\s]+$/',
            'year' => 'required|numeric|min:1|max:9999',
        ]);

        Book::create($request->all());
        return redirect()->route('books.manage')->with('success', 'Book added successfully!');
    }

    public function manage()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $books = Book::all();
        return view('books.manage', compact('books'));
    }

    public function edit($id)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $request->validate([
            'title' => 'required',
            'author' => 'required|regex:/^[a-zA-Z\s]+$/',
            'category' => 'required|regex:/^[a-zA-Z\s]+$/',
            'year' => 'required|numeric|min:1|max:9999',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.manage')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $book = Book::findOrFail($id);

        // Check if book is currently issued
        $isIssued = IssuedBook::where('book_id', $id)->where('status', 'issued')->exists();

        if ($isIssued) {
            return redirect()->route('books.manage')->with('error', 'Cannot delete! This book is currently issued to a student.');
        }

        // Delete related issued_books records first
        IssuedBook::where('book_id', $id)->delete();
        $book->delete();

        return redirect()->route('books.manage')->with('success', 'Book deleted successfully!');
    }
}
