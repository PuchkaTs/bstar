<?php

namespace App\Providers;

use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->shareCurrentUser();

        $this->shareMenus();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function shareMenus()
    {
        $views = ['company.show', 'pages.home', 'pages.cart', 'pages.success', 'pages.store', 'pages.store_index', 'pages.storemenu', 'pages.place', 'pages.placemenu', 'pages.subtype', 'pages.menu', 'pages.posts_index', 'pages.post_show',
        'pages.createad', 'pages.brand', 'pages.product', 'company.edit', 'company.create', 'pages.news_index', 'pages.news_show', 'admin.superAdmin', 'pages.ads_index', 'pages.ads_show', 'auth.register',
        'pages.article', 'pages.search'];
        foreach($views as $aview){
            view()->composer($aview, function ($view)
            {
                $menus = Menu::orderBy('position', 'asc')->with(['promotions' => function ($query)
                {
                    $query->orderBy('position', 'asc');
                }, 'companyTypes' => function ($query)
                {
                    $query->orderBy('position', 'asc');
                }, 'companyTypes.companies'         => function ($query)
                {
                    $query->orderBy('position', 'asc');
                }
                ])->get();
                $view->with('menus', $menus);
            });
        }
    }

    public function shareCurrentUser()
    {
        $views = ['company.show', 'pages.home', 'pages.cart', 'pages.success', 'pages.store', 'pages.store_index', 'pages.storemenu', 'pages.place', 'pages.placemenu', 'pages.subtype', 'pages.menu',  'pages.posts_index', 'pages.post_show',
        'pages.createad', 'pages.brand', 'pages.product', 'company.edit', 'company.create', 'pages.news_index', 'pages.news_show', 'admin.superAdmin', 'pages.ads_index', 'pages.ads_show', 'auth.register', 
        'pages.article', 'pages.search'];
        foreach($views as $aview){
            view()->composer($aview, function ($view)
            {
                $view->with('currentUser', Auth::user());
            });
        }

    }
}
