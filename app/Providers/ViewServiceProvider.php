<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Project;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        view()->composer('site.*', function ($view) {

            $setting = Setting::first();

            $abouts = About::visible()
                ->orderBy('sort_order')
                ->get();

            $social_links = SocialLink::all();

            $banners = Banner::where('is_published', true)
                ->orderBy('sort_order')
                ->get();

            $projects = Project::visible()
                ->orderBy('order')
                ->get();

            $view->with([
                'setting' => $setting,
                'abouts' => $abouts,
                'social_links' => $social_links,
                'banners' => $banners,
                'projects' => $projects,
            ]);
        });
    }
}
