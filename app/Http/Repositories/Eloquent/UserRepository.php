<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function getUserCurrentlyLoggedIn()
    {
        return Auth::user();
    }
}
