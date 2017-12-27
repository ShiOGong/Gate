<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/20
 * Time: 上午10:27
 */

namespace Gate\Model;


use Gate\GateBasisOf;
use Gate\Ticket\GateTicketAbs;

interface TicketModelInf
{
    /**
     * @param $tokenValue
     * @param $type
     * @return mixed
     */
    public function selectByTicketValueAndType($tokenValue, $type);

    /**
     * @return boolean
     */
    public function isNeedPassword();

    /**
     * @param GateBasisOf $basisOf
     * @param GateTicketAbs $ticket
     * @return mixed
     */
    public function createTicket(GateBasisOf $basisOf, GateTicketAbs $ticket);
}