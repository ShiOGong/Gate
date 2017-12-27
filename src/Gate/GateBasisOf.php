<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/17
 * Time: 上午11:11
 */

namespace Gate;


class GateBasisOf
{
    private $ticketType;
    private $keyValue;
    private $password;
    private $userId;
    private $account_id;

    /**
     * @return mixed
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * @param mixed $ticketType
     */
    public function setTicketType($ticketType)
    {
        $this->ticketType = $ticketType;
    }

    /**
     * @return mixed
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }

    /**
     * @param mixed $keyValue
     */
    public function setKeyValue($keyValue)
    {
        $this->keyValue = $keyValue;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param $id
     */
    public function setAccountId($id)
    {
        $this->account_id = $id;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

}