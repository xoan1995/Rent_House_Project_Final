<?php


namespace App\Http\services;


interface UserServiceInterface extends BaseServiceInterface
{
    public function getAllUser();

    public function update($request);

    public function getUserCurrentlyLoggedIn();

    public function findUserById($id);

    public function findOrderById($id);

    public function changePassword($request_data);

    function findHousePosted($condition, $fields);

    function findHouseBooking($condition, $fields);

    function findNotificationByUid($uid, $fields);

    function acceptRent($notification, $order_id);

    function rejectRent($reasons, $notification, $order_id);

    function rejectBooking($order ,$email_host,$reasons);
}
