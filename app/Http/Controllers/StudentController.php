<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Student;
use App\Imports\ImportStudent;
use Storage;
use File;
use Excel;
use Illuminate\Support\Facades\Response as FacadeResponse;

class StudentController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();

        return view('welcome',compact('students'));
    }
    

     /**
     * Download Excel template.
     */
    public function downloadFile()
    {
        $filepath = public_path('StudentQr_template.xlsx');
        return FacadeResponse::download($filepath);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'student' => 'required|mimes:xlx,xls,xlsx|max:2048'
        ]);
        Excel::import(new ImportStudent, $request->file('student'));
        return back()->with('massage', 'Students Imported Successfully');
    }

   
}
