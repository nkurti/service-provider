<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceProviderResource;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function index(Request $request)
    {
        $providers = ServiceProvider::with('category')
            ->filterByCategory($request->category_id)
            ->paginate(8);

        return ServiceProviderResource::collection($providers);
    }

    public function show(ServiceProvider $provider)
    {
        return response()->json($provider->load('category'));
    }
}
