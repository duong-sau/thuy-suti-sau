<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\LoaiSanPham;
use Session;
use App\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //chia sẻ dữ liệu cho các rount
        view()->composer('header',function($view){
            $loai_sp=LoaiSanPham::all();   
            $view->with('loai_sp',$loai_sp);
        });
        
         view()->composer('link_admin',function($view1){
            $loai_sp=LoaiSanPham::all();
            $view1->with('loai_sp',$loai_sp);
        });
        
    }
}
