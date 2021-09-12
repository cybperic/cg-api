<?php
namespace Cg\Http\Routing;


class Route {

    private static $routes = array();

    public static function add($expression, $function, $method = 'get')
    {
        array_push(self::$routes, Array(
            'expression' => $expression,
            'function' => $function,
            'method' => $method
        ));
    }

    public static function run($basepath = '')
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $path = $parsedUrl['path'];
        $path = urldecode($path);

        $method = $_SERVER['REQUEST_METHOD'];
        $pathFound = false;
        $routeFound = false;

        foreach (self::$routes as $route)
        {
            if (preg_match("#^{$route['expression']}$#iu", $path, $matches))
            {
                array_shift($matches);
                $pathFound = true;

                foreach ((array)$route['method'] as $allowedMethod)
                {
                    if (strtolower($method) == strtolower($allowedMethod))
                    {
                        if(call_user_func_array($route['function'], $matches))
                        {
                            $routeFound = true;
                            break 2;
                        }
                    }
                }
            }
        }

        if ($pathFound)
        {
            if (!$routeFound)
            {
                self::methodNotAllowed($path, $method);
            }
        }
        else
        {
            self::pathNotFound($path);
        }
    }

    private static function pathNotFound($path)
    {
        echo "Path: {$path} not found on this server.";
    }

    private static function methodNotAllowed($path, $method)
    {
        echo "Your are not allowed to access this path: {$path} on this server. Using method {$method}.";
    }

}