public function handle($request, Closure $next)
{
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return $next($request);
}
