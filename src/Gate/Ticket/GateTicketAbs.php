<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/17
 * Time: 上午9:59
 */

namespace App\Http\Process\Gate\Ticket;

use App\Http\Process\Gate\GateBasisOf;
use App\Http\Process\Gate\TicketModelInf;

abstract class GateTicketAbs
{
    protected $isAuthenticateSuccess = false;
    protected $isNeedPassword = true;
    protected $basisOfData;
    protected $matchingTicketData;
    private $model;

    public function __construct(GateBasisOf $basisOfData, TicketModelInf $model)
    {
        $this->basisOfData = $basisOfData;
        $this->model = $model;
    }

    /**
     * 是否需要密码
     * @return mixed
     */
    abstract public function isNeedPassword();

    /**
     * 认证流程
     * @return mixed
     */
    abstract public function authentication();

    /**
     * 是否授权过
     * @return boolean
     */
    abstract public function isAuthenticateSuccess();

    /**
     * @param bool $isAuthenticateSuccess
     */
    abstract public function setIsAuthenticateSuccess($isAuthenticateSuccess);

    /**
     * @return int
     */
    abstract public function getTicketType();

    /**
     * 检查其他票据是否存在
     * @return mixed
     */
    abstract public function checkOtherTicketExist();

    /**
     * @return mixed
     */
    public function checkBasisDataExist()
    {
        $data = $this->model->selectByTicketValueAndType($this->basisOfData->getKeyValue(), $this->basisOfData->getTicketType())->toArray();
        return $data ? true : false;
    }

    /**
     * 搜索票据是否存在
     * @throws \Exception
     */
    public function matchingTicket()
    {

        if (!$this->basisOfData instanceof GateBasisOf) {
            throw new \Exception('参数类型错误');
        }
        if ($this->basisOfData->getTicketType() != $this->getTicketType()) {
            throw new \Exception('票据类型错误');
        }
        $data = $this->model->selectByTicketValueAndType($this->basisOfData->getKeyValue(), $this->basisOfData->getTicketType())->toArray();
        $this->matchingTicketData = $data;
        if ($this->model->isNeedPassword()) {
            $this->isNeedPassword = true;
        }
    }

    /**
     * @return mixed
     */
    public function getMatchingTicketData()
    {
        return $this->matchingTicketData;
    }

    /**
     * @return TicketModelInf
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param null $ticketType
     */
    public abstract function setTicketType($ticketType);

    /**
     * @return GateBasisOf
     */
    public function getBasisOfData()
    {
        return $this->basisOfData;
    }

    /**
     * @param GateBasisOf $basisOfData
     */
    public function setBasisOfData(GateBasisOf $basisOfData)
    {
        $this->basisOfData = $basisOfData;
    }
}