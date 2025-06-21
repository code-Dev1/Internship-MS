<?php

namespace App\Http\Controllers\back\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Company;
use App\Models\Internship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboradController extends Controller
{
    public function index()
    {
        $newStudent = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('role', 'student')
            ->count('id');


        $totleStudent = User::where(['role' => 'student'])->count('id');


        $company = Company::count('id');
        if ($company === 1) {

            if (Auth::user()->role === 'company') {
                
                $id = Auth::user()->company->id;
                
                $apps = Application::where('company_id', $id)->orderBy('id', 'desc')->limit(10)->get();
            } else {
                $apps = Application::orderBy('id', 'desc')->limit(10)->get();
            }

        }else {

            $apps = [];
        }

        $avliableI = Internship::where('end_date', '>', today())->count('id');
        return view('admin.dashboard')->with('newStudent', $newStudent)
            ->with('totleStudent', $totleStudent)
            ->with('companies', $company)
            ->with('int', $avliableI)
            ->with('apps', $apps);
    }
}
