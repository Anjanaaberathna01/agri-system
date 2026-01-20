<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupplierMustChangePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supplier = auth()->guard('supplier')->user();

        if ($supplier && $supplier->must_change_password && !$request->is('supplier/change-password')) {
            return redirect()->route('supplier.change-password')
                ->with('info', 'You must change your password before continuing.');
        }

        return $next($request);
    }
}
