<?php
namespace neoistone\http;
/**
 * Class routers
 * @package system
 */
class Request {

    /**
     * @var $routes array
     */
    private static $routes = Array();
    /**
     * @var $pathNotFound null
     */
    private static $pathNotFound = null;
    /**
     * @var $methodNotAllowed null
     */
    private static $methodNotAllowed = null;

    /**
     * @param $expression
     * @param $function
     */
    public static function get($expression, $function){
        array_push(self::$routes,Array(
            'expression' => $expression,
            'function' => $function,
            'method' => 'get'
        ));
    }

    /**
     * @param $expression
     * @param $function
     */
    public static function api_get($expression, $function){

        array_push(self::$routes,Array(
            'expression' => '/api/'.$expression,
            'function' => $function,
            'method' => 'get'
        ));
    }

    /**
     * @param $expression
     * @param $function
     */
    public static function post($expression, $function){
        array_push(self::$routes,Array(
            'expression' => $expression,
            'function' => $function,
            'method' => 'post'
        ));
    }

    /**
     * @param $expression
     * @param $function
     */
    public static function api_post($expression, $function){
        array_push(self::$routes,Array(
            'expression' => '/api/'.$expression,
            'function' => $function,
            'method' => 'post'
        ));
    }

    /**
     * @param $function
     */
    public static function pathNotFound($function){
        self::$pathNotFound = $function;
    }

    /**
     * @param $function
     */
    public static function methodNotAllowed($function){
        self::$methodNotAllowed = $function;
    }

    /**
     * @param string $basepath
     */
    public static function run($basepath = '/'){
        $request = $_SERVER['REQUEST_URI'];
        // Parse current url
        $parsed_url = parse_url($request);//Parse Uri

        $api = explode("/",$request);
        if (equal($api['1'],"api")){
            header('Content-Type: application/json; charset=utf-8');  
        }
        if(isset($parsed_url['path'])){
            $path = $parsed_url['path'];
        }else{
            $path = '/';
        }

        // Get current request method
        $method = $_SERVER['REQUEST_METHOD'];

        $path_match_found = false;

        $route_match_found = false;

        foreach(self::$routes as $route){

            // If the method matches check the path

            // Add basepath to matching string
            if($basepath!=''&&$basepath!='/'){
                $route['expression'] = '('.$basepath.')'.$route['expression'];
            }

            // Add 'find string start' automatically
            $route['expression'] = '^'.$route['expression'];

            // Add 'find string end' automatically
            $route['expression'] = $route['expression'].'$';

            // echo $route['expression'].'<br/>';

            // Check path match
            if(preg_match('#'.$route['expression'].'#',$path,$matches)){

                $path_match_found = true;

                // Check method match
                if(strtolower($method) == strtolower($route['method'])){

                    array_shift($matches);// Always remove first element. This contains the whole string

                    if($basepath!=''&&$basepath!='/'){
                        array_shift($matches);// Remove basepath
                    }

                    echo call_user_func_array($route['function'], $matches);

                    $route_match_found = true;

                    // Do not check other routes
                    break;
                }
            }
        }

        // No matching route was found
        if(!$route_match_found){

            // But a matching path exists
            if($path_match_found){
                http_response_code(405);
                if ($api['1'] == "api"){
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode(array("error" => true, "code" => 405, "message" => "method not allowed"));
                } else {
                  http_response_code(405);
                }

                if(self::$methodNotAllowed){
                    http_response_code(405);
                    call_user_func_array(self::$methodNotAllowed, Array($path,$method));
                }
            }else{
                http_response_code(404);
                if ($api['1'] == "api"){
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode(array("error" => true, "code" => 404, "message" => "invalid request"));
                } else {
                   http_response_code(404);
                }
                if(self::$pathNotFound){
                    http_response_code(404);
                    call_user_func_array(self::$pathNotFound, Array($path));
                }
            }

        }

    }

}
