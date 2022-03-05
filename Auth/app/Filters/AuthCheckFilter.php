<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

// AuthCheckFilter를 사용하기 위해 app\config\Filters.php에 코드 추가
// 로그인이 안되어있으면 dashboard로 접근을 막는 필터
class AuthCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has('loggedUser')) {
            return redirect()->to('/auth')->with('fail','You must be logged In!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}