<?php
namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Log;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        
        $url = $request->url();
        
        if(env("APP_ENV") == "production"){

            if($_SERVER["HTTP_X_FORWARDED_PROTO"] == "http"){

                $result = explode("://",$url);
                
                $secure_url = "https://" . $result[1];
                
                return redirect($secure_url);

            }
        }   

        return $next($request); 
    }
}
?>