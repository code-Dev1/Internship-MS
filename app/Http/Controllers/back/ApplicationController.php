<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'company') {
            if (Auth::user()->company) {
                $app_id = Auth::user()->company->id;
                $data = Application::where('company_id', $app_id)->orderBy('id', 'desc')->paginate(10)->onEachSide(1);
            } else {
                $data = [];
            }
        } else {
            $data = Application::orderBy('id', 'desc')->paginate(10)->onEachSide(1);
        }
        return view('admin.application.application')->with('apps', $data);
    }

    public function accepted(Application $application)
    {
        // if (Auth::user()->role === 'company') {
        // Gate::authorize('selfApplication');
        $application->user_id = $application->user_id;
        $application->internship_id = $application->internship_id;
        $application->slug = $application->slug;
        $application->company_id = $application->company_id;
        $application->pdf = $application->pdf;
        $application->status = 'accepted';
        $application->save();
        Session::flash('success', 'Application successfully accepted');
        return redirect()->back();
        // }
        // Session::flash('danger', 'You don\'t have access');
        // return redirect()->back();
    }
    public function rejected(Application $application)
    {
        if (Auth::user()->role === 'company') {
            Gate::authorize('selfApplication');
            $application->status = 'rejected';
            $application->save();
            Session::flash('success', 'Application successfully rejected');
            return redirect()->back();
        }
        Session::flash('danger', 'You don\'t have access');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        if (Auth::user()->role === 'company') {
            Gate::authorize('selfApplication');
            $application->delete();
            Session::flash('success', 'Application successfully deleted');
            return redirect()->back();
        }
        Session::flash('danger', 'You don\'t have access');
        return redirect()->back();
    }
}
