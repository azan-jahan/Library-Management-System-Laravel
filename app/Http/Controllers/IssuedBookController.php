<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IssuedBookController extends Controller
{
    protected function checkAdminAuth()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function showIssue()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $students = Student::all();
        $books = Book::all();
        return view('issued.issue', compact('students', 'books'));
    }

    public function issue(Request $request)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $student = Student::findOrFail($request->student_id);
        $book = Book::findOrFail($request->book_id);

        IssuedBook::create([
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'issue_date' => now(),
            'status' => 'issued',
        ]);

        return redirect()->route('issued.issue')->with('success', 'Book Issued Successfully!');
    }

    public function showReturn()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $issuedBooks = IssuedBook::with(['student', 'book'])->get();
        return view('issued.return', compact('issuedBooks'));
    }

    public function returnBook($id)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $issuedBook = IssuedBook::findOrFail($id);

        if ($issuedBook->status !== 'issued') {
            return redirect()->route('issued.return')->with('error', 'Book already returned');
        }

        $issuedBook->update([
            'status' => 'returned',
            'return_date' => now(),
        ]);

        return redirect()->route('issued.return')->with('success', 'Book returned successfully');
    }
}
