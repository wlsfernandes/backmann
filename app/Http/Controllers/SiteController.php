<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Project;
use Illuminate\View\View;

class SiteController extends Controller
{
    /**
     * Home Page
     */
    public function home()
    {

        return view('site.home');
    }

    /**
     * About Page
     */
    public function about(): View
    {

        return view('site.about');
    }

    /**
     * Services Page
     */
    public function services(): View
    {

        return view('site.services');
    }

    /**
     * Projects Page
     */
    public function projects(): View
    {
        return view('site.projects');
    }

    /**
     * Contact Page
     */
    public function contact(): View
    {
        return view('site.contact');
    }

    public function projectDetail(string $slug): View
    {
        $project = Project::visible()
            ->where('slug', $slug)
            ->with('images')
            ->firstOrFail();

        return view('site.project-details', compact('project'));
    }
}
