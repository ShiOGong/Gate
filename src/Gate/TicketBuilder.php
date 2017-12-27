<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/17
 * Time: 下午3:29
 */

namespace Gate;

use Gate\Action\GateActionAbs;
use Gate\Exception\TicketNotExistException;
use Gate\Storage\LoginBeanInf;
use Gate\Ticket\GateTicketAbs;

class TicketBuilder
{
    private $ticket;
    private $action;
    private $builderStopReason;
    const STOP_REASON_TICKET_NOT_EXIST = 200001;

    /**
     * TicketBuilder constructor.
     * @param GateTicketAbs $gateTicket
     */
    public function __construct(GateTicketAbs $gateTicket)
    {
        $this->ticket = $gateTicket;
    }

    /**
     * @return GateTicketAbs
     * @throws TicketNotExistException
     * @throws \Exception
     */
    public function authentication()
    {

        $this->ticket->matchingTicket();
        if (!$this->ticket->getMatchingTicketData()) {
            $this->builderStopReason = self::STOP_REASON_TICKET_NOT_EXIST;
            throw new TicketNotExistException('没有找到对应数据', self::STOP_REASON_TICKET_NOT_EXIST);
        }

        $this->ticket->authentication();
        if ($this->ticket->isAuthenticateSuccess()) {
            return $this->ticket;
        } else {
            throw new \Exception('授权失败');
        }
    }

    /**
     * @param GateActionAbs $action
     * @param LoginBeanInf $loginBean
     * @return GateActionAbs
     * @throws \Exception
     */
    public function actionByLoginBean(GateActionAbs $action, LoginBeanInf $loginBean)
    {
        if ($loginBean->getLoginData()) {
            $this->action = $action;
            $this->ticket->setIsAuthenticateSuccess(true);
            $this->action->setTicket($this->ticket);
            $this->action->check();
            $this->action->action();
            return $this->action;
        } else {
            throw new \Exception('授权失败');
        }

    }

    /**
     * 这里因为PHP语言限制不能多态,应该使用构造方法进行多态
     * @param GateActionAbs $action
     * @return GateActionAbs
     * @throws \Exception
     */
    public function action(GateActionAbs $action)
    {
        $this->action = $action;
        $this->action->setTicket($this->ticket);
        $this->action->check();
        $this->action->action();
        return $this->action;
    }
}