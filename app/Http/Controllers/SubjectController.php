<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //index
    public function index()
    {
        //with pagination
        $subjects = Subject::paginate(10);
        // $subjects = \App\Models\Subject::all();
        return view('pages.subjects.index', compact('subjects'));
    }

    //create
    public function create()
    {
        return view('pages.subjects.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subjects,name',
            'description' => 'required',
            'lecturer_id' => 'required|exists:users,id'
        ]);

        Subject::create($request->all());
        return redirect()->route('pages.subjects.index')->with('success', 'Subject created successfully.');
    }
}
