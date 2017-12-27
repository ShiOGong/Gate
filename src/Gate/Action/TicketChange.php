<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/17
 * Time: 上午10:33
 */

namespace Gate\Action;

class TicketChange extends GateActionAbs
{
    /**
     * 执行操作
     * @return mixed
     * @throws \Exception
     */
    public function action()
    {
        if (!$this->ticket->checkOtherTicketExist()) {
            throw new \Exception('不能只有一个票据');
        }
        // 执行操作
    }

    /**
     * @return boolean
     */
    public function isNeedAuthentication()
    {
        return true;
    }
}