<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Producer;
use App\Cart;
use App\Banner;
use App\News;

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
        View()->composer('*', function ($view) {
           $category = Category::where('status',1)->get();              
           $view->with('category',$category);
       });

        View()->composer('*', function ($view) {
           $producer = Producer::where('status',1)->get();              
           $view->with('producer',$producer);
       });

        View()->composer('*',function($view){
           $banner = Banner::where('status',1)->get();
           $view->with('banner',$banner);
       });

        View()->composer('*',function($view){
           $news = News::where('status',1)->orderBy('created_at','desc')->get();

           foreach ($news as $key => $value) {
             $nowTime = time();
             $timeString = $value->created_at->toDateTimeString();
             $time = time() - strtotime($timeString);
             $value->time = $this->getTime($time);    
           }
           $view->with('news',$news);
       });



        View()->composer('*', function ($view) {
           if(Session::has('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }

        // dd($cart->items);
    });

    }


    public function getTime($time){

      if( $time / 60 >= 0 && $time / 60 < 60){
        return (int) ($time/60)." phút trước";
      }
      else if( $time / 3600 >= 1 && $time / 3600 < 24){
        return (int) ($time/3600)." giờ trước";
      }else
      {
        return (int) ($time / 86400)." ngày trước";
      }
    
    }

}
