<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        if ($user->role === 'company') {
            return view('admin.company.company')
                ->with('companies', Company::where('user_id', $user_id)->orderBy('id', 'desc')->get());
        }
        return view('admin.company.company')
            ->with('companies', Company::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->role !== 'company') {
            Session::flash('danger', 'You c\'not add Company');
            return redirect()->back();
        }
        if ($user->company) {
            Session::flash('danger', 'You c\'not add more then 1 Company');
            return redirect()->back();
        }

        return view('admin.company.add-company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'company') {
            Session::flash('danger', 'You c\'not add Company');
            return redirect()->back();
        }
        if ($user->company) {
            Session::flash('danger', 'You c\'not add more then 1 Company');
            return redirect()->back();
        }
        $request->validate([
            'company_name' => 'required|min:3|max:32|string',
            'website_address' => 'nullable|url|min:10|max:255',
            'description' => 'string|min:20'
        ]);

        $nameSlug = Str::slug($request->company_name);
        $randomSlug = Str::random(60);

        Company::create([
            'user_id' => $request->user()->id,
            'name' => $request->company_name,
            'description' => $request->description,
            'website' => $request->website_address,
            'slug' => $randomSlug . time() . $nameSlug
        ]);
        Session::flash('success', 'Successfully created.');
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        if (!Auth::user()->role === 'admin') {
            Gate::authorize('selfCompany', $company);
        }
        return view('admin.company.showCompany')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        Gate::authorize('selfCompany', $company);
        return view('admin.company.add-company')
            ->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        Gate::authorize('selfCompany', $company);
        $request->validate([
            'company_name' => 'required|min:3|max:32|string',
            'website_address' => 'nullable|url|min:10|max:255',
            'description' => 'string|min:20'
        ]);

        $company->name = $request->company_name;
        $company->website = $request->website_address;
        $company->save();

        Session::flash('success', 'Successfully updated.');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        Gate::authorize('selfCompany', $company);
        $company->delete();
        Session::flash('success', 'successfully deleted');
        return redirect()->route('company.index');
    }
}
