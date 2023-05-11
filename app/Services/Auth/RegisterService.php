<?php

namespace App\Services\Auth;

use App\Services\Auth\Contracts\LoginServiceInterface;
use App\Services\Auth\Contracts\RegisterServiceInterface;
use App\Services\User\Contracts\UserServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Support\Facades\DB;

class RegisterService implements RegisterServiceInterface
{

    private UserServiceInterface $userService;
    private LoginServiceInterface $loginService;

    public function __construct(UserServiceInterface $userService, LoginServiceInterface $loginService)
    {
        $this->userService = $userService;
        $this->loginService = $loginService;
    }

    /**
     * @param array $data
     * @return Model
     * @throws Exception
     */
    public function register(array $data): Model
    {
       return DB::transaction(function () use($data){
           $user = $this->userService->store($data);
           if (!$this->loginService->processLogin(['email' => $data['email'], 'password' => $data['password']])) {
//               $this->userService->destroy($user);
               throw new Exception("Couldn't register user");
           }

           return $user;
       });
    }
}
