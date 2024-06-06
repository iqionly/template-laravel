<?php

namespace App\Utilities;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as ItemRoute;
use Illuminate\Routing\UrlGenerator;
use Str;

class RouteUtility
{
    protected Collection $routes;
    protected $starttime;
    public function __construct()
    {
        $this->starttime = microtime(true);
        $this->routes = $this->routes();
    }

    public function routes(): Collection
    {
        return collect(Route::getRoutes())->map(function(ItemRoute $item){
            $parameters = [];
            if($item->parameterNames() != null) {
                $result = [];
                array_map(function($param) use (&$result){
                    $result[$param] = ':' . $param;
                }, $item->parameterNames());
                $parameters = $result;
            }
            return (object) [
                'uri' => $item->uri,
                'name' => $item->getName(),
                'methods' => $item->methods,
                'url' => $item->getName() ? route($item->getName(), $parameters) : url($item->uri)
            ];
        })->keyBy('name');
    }

    public function routesPref(string $prefix): Collection
    {
        $self = &$this;
        $result = $this->routes->filter(function(object $route) use ($prefix, $self){
            // dump($route->uri, $self->prefixToUri($prefix), '-----');
            return Str::startsWith($route->uri, $self->prefixToUri($prefix));
        });
        // Check runtime
        $this->runtime();
        return $result;
    }

    private function prefixToUri(string $prefix): string
    {
        return Str::replace('.', '/', $prefix);
    }

    private function runtime()
    {
        // dump(microtime(true) - $this->starttime . ' seconds');
    }
}   