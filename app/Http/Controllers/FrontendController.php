<?php

namespace App\Http\Controllers;

use App\Models\CourseData;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function frontPage()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function trading()
    {
        return view('frontend.trading');
    }

    public function course()
    {
        $result['courses'] = CourseData::all();
        return view('frontend.course')->with($result);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function termsCondition()
    {
        return view('frontend.terms-&-condition');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
}
