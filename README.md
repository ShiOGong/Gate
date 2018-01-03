## 简介
本组件包含多票据的诸多处理策略,支持自定义扩展

## 安装
```
composer shiogong/gate install
```
## 用例
### 初始化
```
// 入门票据基础类(用户输入的数据,存入相应的位置中)
$basisOf = new GateBasisOf();
// 票据关键值
$basisOf->setKeyValue($openId);
// 票据类型
$basisOf->setTicketType(UserToken::USER_TOKEN_TYPE_MINIPROGRAM);

// 票据存储的数据库model
$tokenModel = new UserToken();
// 票据的操作类
$ticketObj = new GateTicketOpenId($basisOf, $tokenModel);
// 初始化
$ticketBuilder = new TicketBuilder($ticketObj));
```
### 设置数据Model
记得你是需要实现一个数据Model的,这个Model必须实现TicketModelInf接口

### 授权认证
```
// 授权认证
$ticket = $ticketBuilder->authentication();
```

### 票据动作(系统预设)
票据动作就是一些相关票据的标准业务模式

#### 创建票据
```
$action = new TicketCreate();
$ticketBuilder->action($action);
```

## 扩展
### 扩展票据类型
你可能需要创建系统中不包括的票据类型,比如邮箱,用户名等.
#### 1.继承抽象类GateTicketAbs
任意类继承抽象类GateTicketAbs,这个类是票据的基础类,任何票据都必须是这个抽象类的衍生类
##### 强制实现方法
继承之后,有几个需要强制实现的方法,这些方法与你的票据息息相关,这几个方法必须实现,并且做出相应的设置,isAuthenticateSuccess这个方法的返回值尤为重要,如果他返回true,直接视为此票据授权成功
```
    /**
     * 是否需要密码
     * @return boolean
     */
    abstract public function isNeedPassword();
    
    /**
     * 认证流程
     * @return mixed
     */
    abstract public function authentication();
    
    /**
     * 是否授权成功
     * @return boolean
     */
    abstract public function isAuthenticateSuccess();
    
    /**
     * 外部直接设置授权是否成功
     * @param bool $isAuthenticateSuccess
     */
    abstract public function setIsAuthenticateSuccess($isAuthenticateSuccess);
    
    /**
     * 得到票据类型
     * @return int
     */
    abstract public function getTicketType();
    
   /**
    * 外部直接设置票据类型
    * @param null $ticketType
    */
    public abstract function setTicketType($ticketType);
    
    /**
     * 检查其他票据是否存在
     * @return mixed
     */
    abstract public function checkOtherTicketExist();
```
##### 便利的上下文方法
该类还有几个专门获取上下文的方法
```
    /**
     * 得到TokenModel
     * @return mixed
     */
    function getModel();
    
    /**
     * 得到从数据库中匹配的数据
     * @return mixed
     */
    function getMatchingTicketData();
    
    /**
     * 得到输入的数据
     * @return mixed
     */
    function getBasisOfData();
    
```

##### 预设的验证或工具方法
抽象类实现了几个核心流程方法,如果他们的验证方式不符合你的预期,你可以通过重载的方式解决这个问题
```$xslt
    /**
     * 匹配票据数据
     * @return mixed
     */
    function matchingTicket();
    
    /**
     * 检查输入的数据是否存在于model中
     * @return mixed
     */
    function checkBasisDataExist();
```

### 扩展操作

### 扩展自定义流程



