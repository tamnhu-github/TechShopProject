<?php
namespace App;
use App\Controller\PostController;
use App\Controller\UserController;

//Khi một URL được gọi, Router sẽ tìm kiếm pattern khớp và gọi hàm callback tương ứng, chuyển tiếp các tham số trích xuất từ URL.
class Router {
    private $routes = [];

    //thêm mới 1 route vào $routes
    //$pattern mô tả 1 url
    //$callback được gọi khi url khớp với $pattern

    public function addRoute($pattern, $callback) {
        $this->routes[$pattern] = $callback;
    }
    
    //tìm xem url hiện tại ($uri) có khớp với $pattern trong $routes không
    public function match($uri) {
        // Sort routes by specificity (longer patterns first)
        uksort($this->routes, function ($a, $b) {
            return strlen($b) - strlen($a);
        });

        foreach ($this->routes as $pattern => $callback) {
            //hàm preg_match() kiểm tra xem url có khớp với $pattern không 
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Remove the full match

                //Nếu một pattern khớp, hàm sẽ gọi callback function tương ứng ($callback) và truyền vào các tham số được trích xuất từ URL ($matches).
                //hàm có sẵn của php, gọi hàm $callback với argument là $matches, nhờ hàm này mới goị hàm $callback
                call_user_func_array($callback, $matches);
                //Sau khi một pattern khớp, hàm match() sẽ ngay lập tức trả về, không tiếp tục kiểm tra các pattern khác.
                return;
            }
        }
    }
}
?>