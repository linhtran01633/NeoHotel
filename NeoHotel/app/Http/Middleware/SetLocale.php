<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');
        if (!in_array($locale, ['en', 'ja', 'vn'])) {
            if(!Session::get('locale')){
                $locale = 'en'; // Giá trị mặc định nếu không hợp lệ
            }else {
                $locale = Session::get('locale'); 
            }
            
        }

        // Lấy ngôn ngữ từ session hoặc sử dụng ngôn ngữ mặc định
        App::setLocale($locale); // Cập nhật ngôn ngữ
        Session::put('locale', $locale); // Lưu vào session để dùng sau

        return $next($request);
    }
}
