<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;


class InternshipController extends Controller
{
    public function index()
    {
        return view('front.internship')->with('internships', Internship::orderBy('id', 'desc')->paginate(10));
    }

    public function singleInternship(Internship $int)
    {
        return view('front.internshipDescription')->with('int', $int);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'pdf' => [
                'required',
                File::types('pdf')
                    ->max(1024 * 5)
            ]
        ]);
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $originalName = $pdf->getClientOriginalName();
            $newName = time() . '_' . $originalName;
            $filePath = $pdf->storeAs('pdfs', $newName, 'public');
        }
        $Int = Internship::find($request->id);
        $cId = $Int->company->id;
        $check = Application::create([
            'user_id' => $request->user()->id,
            'internship_id' => $request->id,
            'slug' => Str::random(80),
            'company_id' => $cId,
            'pdf' => $filePath
        ]);
        if (!$check) {
            Session::flash('fdanger', 'Apply to internship field');
            return redirect()->route('front.int');
        }
        Session::flash('fsuccess', 'Apply successfully');
        return redirect()->route('front.int');
    }
}
