<?php

namespace App\Http\View\Composers;

use App\Models\SiteSetting;
use App\Models\HomeSection;
use Illuminate\View\View;

class SiteSettingComposer
{
    public function compose(View $view)
    {
        $view->with('siteSettings', SiteSetting::first());
        $view->with('homeSections', HomeSection::where('is_visible', true)->orderBy('order')->get()->keyBy('type'));
    }
}
