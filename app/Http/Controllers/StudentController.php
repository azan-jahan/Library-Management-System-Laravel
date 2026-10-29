<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function showPortal()
    {
        return view('student.portal');
    }

    public function showRegister()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z ]+$/',
            'roll_no' => 'required|regex:/^[A-Za-z0-9\-]+$/|unique:students,roll_no',
            'class' => 'required|regex:/^[A-Za-z0-9\- ]+$/',
            'contact' => 'required|regex:/^[0-9]{10,15}$/',
        ]);

        Student::create($request->all());
        return redirect()->route('student.register')->with('message', 'Student Registered Successfully!')->with('msgColor', 'green');
    }

    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'roll_no' => 'required',
        ]);

        $student = Student::where('roll_no', $request->roll_no)->first();

        if ($student) {
            Session::put('student_id', $student->id);
            return redirect()->route('student.dashboard');
        }

        return back()->with('message', 'Roll number not found!');
    }

    public function dashboard()
    {
        if (!Session::has('student_id')) {
            return redirect()->route('student.login');
        }

        $student = Student::findOrFail(Session::get('student_id'));
        $books = Book::all();
        $issued = IssuedBook::with('book')
            ->where('student_id', $student->id)
            ->get();

        return view('student.dashboard', compact('student', 'books', 'issued'));
    }

    public function borrow($id)
    {
        if (!Session::has('student_id')) {
            return redirect()->route('student.login');
        }

        $book_id = (int) $id;
        $student_id = (int) Session::get('student_id');

        if ($book_id <= 0) {
            return redirect()->route('student.dashboard')->with('error', 'Invalid book');
        }

        $book = Book::find($book_id);
        if (!$book) {
            return redirect()->route('student.dashboard')->with('error', 'Book not found');
        }

        // Check if book is already issued to ANY student
        $isIssued = IssuedBook::where('book_id', $book_id)
            ->where('status', 'issued')
            ->exists();

        if ($isIssued) {
            return redirect()->route('student.dashboard')->with('error', 'Book is already issued to another student');
        }

        // Check if student already borrowed this book
        $alreadyBorrowed = IssuedBook::where('student_id', $student_id)
            ->where('book_id', $book_id)
            ->where('status', 'issued')
            ->exists();

        if ($alreadyBorrowed) {
            return redirect()->route('student.dashboard')->with('error', 'You already borrowed this book! Return it first.');
        }

        // Issue book
        IssuedBook::create([
            'student_id' => $student_id,
            'book_id' => $book_id,
            'issue_date' => now(),
            'status' => 'issued',
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Book Borrowed Successfully!');
    }

    public function logout()
    {
        Session::forget('student_id');
        return redirect()->route('landing');
    }
}
