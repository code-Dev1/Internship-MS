<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'company') {
            if (Auth::user()->company) {
                $company_id = Auth::user()->company->id;
                $internships = Internship::where('company_id', $company_id)->orderBy('id', 'desc')->paginate(10)->onEachSide(1);
            } else {
                $internships = [];
            }
        } else {
            $internships = Internship::orderBy('id', 'desc')->paginate(10)->onEachSide(1);
        }
        return view('admin.internship.internship')->with('internships', $internships);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.internship.add-internship');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:20',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'requirements' => 'required|string',
            'time' => 'required'
        ]);
        $titleSlug = Str::slug($request->title);
        $randomSlug = Str::random(60);
        Internship::create([
            'company_id' => $request->user()->company->id,
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $randomSlug . time() . $titleSlug,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'gender' => $request->gender,
            'education' => $request->education,
            'email' => $request->email,
            'requirements' => $request->requirements,
            'time' => $request->time
        ]);
        Session::flash('success', 'Successfully created');
        return redirect()->route('internship.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Internship $internship)
    {
        if (!Auth::user()->role === 'admin') {
            Gate::authorize('selfInternship', $internship);
        }
        return view('admin.internship.showInternship')->with('int', $internship);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Internship $internship)
    {
        Gate::authorize('selfInternship', $internship);
        return view('admin.internship.add-internship')->with('internship', $internship);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Internship $internship)
    {
        Gate::authorize('selfInternship', $internship);
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:20',
            'end_date' => 'required|date|after_or_equal:today',
            'location' => 'required'
        ]);
        $internship->title = $request->title;
        $internship->description = $request->description;
        $internship->end_date = $request->end_date;
        $internship->location = $request->location;
        $internship->gender = $request->gender;
        $internship->education = $request->education;
        $internship->email = $request->email;
        $internship->requirements = $request->requirements;
        $internship->time = $request->time;
        $internship->save();
        Session::flash('success', 'successfully updated');
        return redirect()->route('internship.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Internship $internship)
    {
        Gate::authorize('selfInternship', $internship);
        $internship->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect()->route('internship.index');
    }
}
