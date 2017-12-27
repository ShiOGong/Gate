<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/12/20
 * Time: 下午3:36
 */

namespace App\Http\Process\Gate\Exception;


use Exception;
use Throwable;

class TicketNotExistException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}