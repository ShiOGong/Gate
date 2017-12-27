<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/17
 * Time: 上午10:29
 */

namespace App\Http\Process\Gate\Action;


use App\Http\Process\Gate\Ticket\GateTicketAbs;

abstract class GateActionAbs
{
    protected $ticket;

    /**
     * 执行操作
     * @return mixed
     */
    abstract public function action();

    /**
     * @return boolean
     */
    abstract public function isNeedAuthentication();

    /**
     * @throws \Exception
     */
    public function check()
    {
        if ($this->isNeedAuthentication()) {
            if (!$this->ticket instanceof GateTicketAbs) {
                throw new \Exception('需要授权执行');
            } else {
                if (!$this->ticket->isAuthenticateSuccess()) {
                    // 尝试授权
                    $this->ticket->authentication();
                    if (!$this->ticket->isAuthenticateSuccess()) {
                        // 认证失败
                        throw new \Exception('需要执行的票据授权不成功');
                    }
                }
            }
        }
    }

    /**
     * @param $ticket
     */
    public function setTicket(GateTicketAbs $ticket)
    {
        $this->ticket = $ticket;
    }
}