<?php

namespace App\Http\Controllers\back\language;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class LanguadeController extends Controller
{
        public function index($locale){
        if($locale =='en' ||$locale =='dr'||$locale =='pa'){
            Session()->put('locale',$locale);
            if ($locale === 'dr' || $locale === 'pa') {
                Session::put(['direction' => 'rtl']);
            } else {
                Session::put(['direction' => 'ltr', 'language' => 'en']);
            }
            return redirect(url()->previous());
        }else{
            return redirect(url()->previous());
        }
    }
}
