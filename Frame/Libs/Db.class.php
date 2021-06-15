<?php
// 声明命名空间
namespace Frame\Libs;

# mysqli版
// 定义最终的单例的数据库操作类
final class Db
{
    // 用于保存数据库连接
    private $link;
    // 私有的静态的保存对象的属性
    private static $obj = null;

    // 私有的数据库配置信息
    private $db_host; // 主机名
    private $db_user; // 用户名
    private $db_pass; // 密码
    private $db_name; // 数据库名
    private $charset; // 字符集

    // 私有的构造方法：阻止类外new对象
    private function __construct()
    {
        $this->db_host = $GLOBALS['config']['db_host'];
        $this->db_user = $GLOBALS['config']['db_user'];
        $this->db_pass = $GLOBALS['config']['db_pass'];
        $this->db_name = $GLOBALS['config']['db_name'];
        $this->charset = $GLOBALS['config']['charset'];
        $this->connct_db();   // 连接mysql数据库
        $this->select_db();   // 选择数据库
        $this->set_charset(); // 设置字符集
    }
    // 私有的克隆方法：阻止类外clone对象
    private function __clone()
    {
    }

    // 公共的静态的创建对象的方法
    public static function getInstance()
    {
        // 判断当前对象是否存在
        if (!self::$obj instanceof self) {
            // 如果对象不存在， 则创建它
            self::$obj = new self();
        }
        // 如果对象已经存在，直接返回
        return self::$obj;
    }

    // 私有的连接mysql服务器的方法
    private function connct_db()
    {
        // 连接数据库并保存
        $this->link = @mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
        if(!$this->link){
            die('连接数据库失败');
        }
    }

    // 私有的选择数据库的方法
    private function select_db()
    {
        if (!mysqli_query($this->link, "use {$this->db_name}")) {
            die("选择数据库{$this->db_name}失败");
        }
    }

    // 私有的设置字符集
    private function set_charset()
    {
        mysqli_query($this->link, "set names {$this->charset}");
    }

    // 公共的执行sql语句的方法：insert,update,delete,set,create,drop
    public function exec($sql)
    {
        // 将sql语句转成全小写
        $sql = strtolower($sql);
        // 判断sql语句是不是select语句
        if (substr($sql, 0, 6) == 'select') {
            die("该方法不能执行select语句");
        }
        // 如果是非select语句， 则正常执行
        return mysqli_query($this->link, $sql);
    }

    //私有的执行sql语句的方法：select
    private function query($sql)
    {
        // 将sql语句转成全小写
        $sql = strtolower($sql);
        // 判断sql语句是不是select语句
        if (substr($sql, 0, 6) != 'select') {
            die("该方法不能执行非select语句");
        }
        // 如果是select语句， 则正常执行，并返回结果集
        return mysqli_query($this->link, $sql);
    }

    // 公共的获取单行记录的方法 fetch_
    public function fetch_one($sql, $type = 3)
    {
        // 执行sql语句并返回结果
        $result = $this->query($sql);

        // 定义返回的数组的类型
        $types = array(
            1 => MYSQLI_NUM,
            2 => MYSQLI_BOTH,
            3 => MYSQLI_ASSOC,
        );

        // 返回一条记录(一维数组)
        return mysqli_fetch_array($result, $types[$type]);
    }

    // 公共的获取多行记录的方法
    public function fetch_all($sql, $type = 3)
    {
        // 执行sql语句并返回结果
        $result = $this->query($sql);

        // 定义返回的数组的类型
        $types = array(
            1 => MYSQLI_NUM,
            2 => MYSQLI_BOTH,
            3 => MYSQLI_ASSOC,
        );

        // 循环从结果集中取出所有记录， 并存入一个新数组中
        while($row = mysqli_fetch_array($result, $types[$type])){
            $arrs[] = $row;
        }

        // 返回二维数组
        return $arrs;
    }

    // 公共的获取记结果录行数数的方法
    public function rowCount($sql){
        // 执行sql语句并返回结果集
        $result = $this->query($sql);
        // 返回记录数
        return mysqli_num_rows($result);
    }
}


// // 
// $arr = array(
//     'db_host' => 'localhost',
//     'db_user' => 'root',
//     'db_pass' => '123456',
//     'db_name' => 'itcast',
//     'charset' => 'utf8',
// );

// echo '<pre>';
// $obj1 = Db::getInstance($arr);
// $obj2 = Db::getInstance($arr);
// $obj3 = Db::getInstance($arr);
// var_dump($obj1, $obj2, $obj3);

