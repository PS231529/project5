namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogApiRequests
{
    public function handle($request, Closure $next)
    {
        // Log the request
        Log::info('API Request', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'headers' => $request->headers->all(),
            'body' => $request->except(['password', 'password_confirmation']),
        ]);

        // Proceed with the request
        $response = $next($request);

        // Log the response
        Log::info('API Response', [
            'status' => $response->status(),
            'headers' => $response->headers->all(),
            'content' => $response->getContent(),
        ]);

        return $response;
    }
}
