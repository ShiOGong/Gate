<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/12/20
 * Time: 下午3:36
 */

namespace Gate\Exception;


use Exception;
use Throwable;

class TicketNotExistException extends Exception
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}