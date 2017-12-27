<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/12/20
 * Time: 上午11:09
 */

namespace Gate\Action;


use Gate\Ticket\GateTicketAbs;
use Exception;

class TicketCreate extends GateActionAbs
{
    private $actionResult;

    /**
     * 执行操作
     * @return mixed
     * @throws Exception
     */
    public function action()
    {
        $ticket = $this->ticket;
        if ($ticket instanceof GateTicketAbs) {
            if ($ticket->checkBasisDataExist()) {
                return false;
            }

            $model = $ticket->getModel();
            if (!$ticket->getBasisOfData()->getKeyValue()) {
                throw new Exception('票据关键参数错误');
            }

            $model->createTicket($ticket->getBasisOfData(), $ticket);
        }
    }

    /**
     * @return boolean
     */
    public function isNeedAuthentication()
    {
        return false;
    }
}