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
        $views = ['company.show', 'pages.home', 'pages.cart', 'pages.success', 'pages.store', 'pages.product', 'company.edit', 'company.create', 'admin.superAdmin'];
        foreach($views as $aview){
            view()->composer($aview, function ($view)
            {
                $menus = Menu::orderBy('position', 'asc')->with(['companyTypes' => function ($query)
                {
                    $query->orderBy('name', 'asc');
                }, 'companyTypes.companies'         => function ($query)
                {
                    $query->orderBy('position', 'desc');
                }
                ])->get();
                $view->with('menus', $menus);
            });
        }
    }

    public function shareCurrentUser()
    {
        $views = ['company.show', 'pages.home', 'pages.cart', 'pages.success', 'pages.store', 'pages.product', 'company.edit', 'company.create', 'admin.superAdmin'];
        foreach($views as $aview){
            view()->composer($aview, function ($view)
            {
                $view->with('currentUser', Auth::user());
            });
        }

    }
}
