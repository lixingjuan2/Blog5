<?php
// 声明命名空间
namespace Frame\Vendor;

use \PDO;           // 引入PDO类
use \PDOException;  // 引入PDOEexception类

// 定义最终的PDOWrapper类
final class PDOWrapper
{
    // 数据库配置属性
    private $db_type;
    private $db_host;
    private $db_port;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $charset;
    private $pdo = NULL; // 保存pd对象

    // 构造方法
    public function __construct()
    {
        $this->db_type = $GLOBALS['config']['db_type'];
        $this->db_host = $GLOBALS['config']['db_host'];
        $this->db_port = $GLOBALS['config']['db_port'];
        $this->db_user = $GLOBALS['config']['db_user'];
        $this->db_pass = $GLOBALS['config']['db_pass'];
        $this->db_name = $GLOBALS['config']['db_name'];
        $this->charset = $GLOBALS['config']['charset'];
        $this->connectDb();     // 创建pdo对象， 连通数据库， 选择数据库
        $this->setErrMode();    // 设置pdo的错误模式
    }

    // 私有的创建pdo对象
    private function connectDb()
    {
        try {
            $dsn = "{$this->db_type}:host={$this->db_host};port={$this->db_port};";
            $dsn .= "dbname={$this->db_name};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->db_user, $this->db_pass);
        } catch (PDOException $e) {
            echo "<h2>创建pdo对象失败</h2>";
            echo "错误状态码：" . $e->getCode();
            echo "<br>错误行号：" . $e->getLine();
            echo "<br>错误文件：" . $e->getFile();
            echo "<br>错误信息：" . $e->getMessage();
            die();
        }
    }

    // 私有的设置pdo错误模式的方法
    private function setErrMode()
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // 公共的执行sql语句方法：insert,delete, update, set等
    public function exec($sql)
    {
        try {
            return $this->pdo->exec($sql);
        } catch (PDOException $e) {
            $this->showError($e);
        }
    }

    // 获取单行数据（一维数组）
    public function fetchOne($sql)
    {
        try {
            // 执行sql语句， 并返回结果集对象
            $PDOStatement = $this->pdo->query($sql);
            // 从结果集对象取回一条记录, 并返回
            return $PDOStatement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->showError($e);
        }
    }

    // 获取多行数据（二维数组）
    public function fetchAll($sql)
    {
        try {
            // 执行sql语句， 并返回结果集对象
            $PDOStatement = $this->pdo->query($sql);
            // 从结果集对象， 返回二维数组
            return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->showError($e);
        }
    }

    // 获取记录数
    public function rowCount($sql)
    {
        try {
            // 执行sql语句， 并返回结果集对象
            $PDOStatement = $this->pdo->query($sql);
            // 从结果集对象， 返回记录数
            return $PDOStatement->rowCount();
        } catch (PDOException $e) {
            $this->showError($e);
        }
    }

    // 私有的显示错误信息方法
    private function showError(PDOException $e)
    {
        echo "<h2>SQL语句有问题！</h2>";
        echo "错误状态码：" . $e->getCode();
        echo "<br>错误行号：" . $e->getLine();
        echo "<br>错误文件：" . $e->getFile();
        echo "<br>错误信息：" . $e->getMessage();
        die();
    }
}
