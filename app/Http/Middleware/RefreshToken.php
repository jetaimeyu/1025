<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class RefreshToken extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //检查此次请求中是否有token，如果没有则抛出异常
        $this->checkForToken($request);
        try {
            //检测用户登录状态， 如果正常则通过
            if ($this->auth->parseToken()->authenticate()) {
                return $this->setAuthenticationHeader($next($request), "wdwdwdw");
                return $next($request);
            }
            throw new UnauthorizedException('jwt-auth', '未登录');
        } catch (TokenExpiredException $exception) {
            //此次捕捉到了token过期所抛出的TokenExpiredException异常， 我们在这里需要做的是刷新该用户的token并将它添加到响应头中
            try{
                //刷新用户的token
                $token= $this->auth->refresh();
                //使用一次性登录  保证此次请求成功
                auth('api')->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
            }catch (JWTException $exception){
                //如果捕捉到此异常  代表refresh也过期了 用户无法刷新令牌 ， 需要重新登录
                throw new UnauthorizedHttpException('jwt-auth', $exception->getMessage());
            }
        }
       //在响应头中返回新的token
        return $this->setAuthenticationHeader($next($request), $token);
    }
}
