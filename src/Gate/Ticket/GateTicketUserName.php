<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/17
 * Time: 上午11:03
 */

namespace App\Http\Process\Gate\Ticket;

class GateTicketUserName extends GateTicketAbs
{
    /**
     * 是否需要密码
     * @return mixed
     */
    public function isNeedPassword()
    {
        return $this->isNeedPassword = true;
    }

    /**
     * 认证流程
     * @return mixed
     * @throws \Exception
     */
    public function authentication()
    {
        if ($this->matchingTicketData['username'] != $this->basisOfData->getKeyValue()) {
            throw new \Exception('关键值不能吻合');
        }

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
     * 检查其他票据是否存在
     * @return mixed
     */
    public function checkOtherTicketExist()
    {

    }

    /**
     * @param bool $isAuthenticateSuccess
     */
    public function setIsAuthenticateSuccess($isAuthenticateSuccess)
    {
        $this->isAuthenticateSuccess = $isAuthenticateSuccess;
    }
}