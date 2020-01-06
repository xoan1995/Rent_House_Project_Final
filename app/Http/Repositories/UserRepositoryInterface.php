<?php


namespace App\Http\Repositories;


interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getUserCurrentlyLoggedIn();
}
