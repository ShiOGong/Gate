<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/12/8
 * Time: 下午3:49
 */

namespace Gate\Ticket;


class GateTicketOpenId extends GateTicketAbs
{
    private $matchingUserData;


    /**
     * 是否需要密码
     * @return false
     */
    public function isNeedPassword()
    {
        return $this->isNeedPassword = false;
    }

    /**
     * 认证流程
     * @return mixed
     * @throws \Exception
     */
    public function authentication()
    {
        if ($this->matchingTicketData[0]['user_token_value'] != $this->requestBeanData->getKeyValue()) {
            throw new \Exception('关键值不能吻合');
        }
//        $userModel = new User();
//        $userData = $userModel->findUserData($this->matchingTicketData[0]['user_id'])->toArray();
//        $this->setMatchingUserData($userData);


        // TODO:: 授权认证过程
        $this->setIsAuthenticateSuccess(true);
    }

    /**
     * 是否授权过
     * @return boolean
     */
    public function isAuthenticateSuccess()
    {
        return $this->isAuthenticateSuccess;
    }

    /**
     * @param bool $isAuthenticateSuccess
     */
    public function setIsAuthenticateSuccess($isAuthenticateSuccess)
    {
        $this->isAuthenticateSuccess = $isAuthenticateSuccess;
    }

    /**
     * 检查其他票据是否存在
     * @return mixed
     */
    public function checkOtherTicketExist()
    {
    }

    /**
     * @return mixed
     */
    public function getMatchingUserData()
    {
        return $this->matchingUserData;
    }

    /**
     * @param mixed $matchingUserData
     */
    public function setMatchingUserData($matchingUserData)
    {
        $this->matchingUserData = $matchingUserData;
    }

    /**
     * @return int
     */
    public function getTicketType()
    {
        return UserToken::USER_TOKEN_TYPE_MINIPROGRAM;
    }
}