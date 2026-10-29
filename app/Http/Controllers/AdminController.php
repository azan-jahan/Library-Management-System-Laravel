<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    protected function checkAdminAuth()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function dashboard()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck) return $authCheck;

        $bookCount = Book::count();
        $studentCount = Student::count();
        $issuedCount = IssuedBook::where('status', 'issued')->count();
        $returnedCount = IssuedBook::where('status', 'returned')->count();

        return view('admin.dashboard', compact('bookCount', 'studentCount', 'issuedCount', 'returnedCount'));
    }
}
