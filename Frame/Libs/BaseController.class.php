<?php
// 声明命名空间
namespace Frame\Libs;
// use \Frame\Vendor\Smarty;

// 定义抽象的基础控制器类
abstract class BaseController
{
    // 受保护的Smarty对象属性
    protected $smarty = NULL;

    // 公共的构造方法
    public function __construct()
    {
        $this->initSmarty(); // Smarty对象初始化
    }

    // 私有的Smarty对象初始化方法
    private function initSmarty()
    {
        // 创建Smarty类的对象
        $smarty = new \Frame\Vendor\Smarty();
        // Smarty配置
        $smarty->left_delimiter = "<{";     // 左定界符
        $smarty->right_delimiter = "}>";    // 右定界符
        $smarty->setTemplateDir(VIEW_PATH); // 设置视图文件目录
        $smarty->setCompileDir(sys_get_temp_dir() . DS . "view"); // 设置编译目录，  sys_get_temp_dir()
        // 给$samrty属性赋值
        $this->smarty = $smarty;
    }

    //用户权限验证方法
    protected function denyAccess()
    {
        // 判断用户是否登录
        if (!isset($_SESSION['username'])) {
            $this->jump("必须先登录才能访问！", "?c=User&a=login");
        }
    }

    // 受保护的跳转方法
    protected function jump($message, $url = "?", $time = 3)
    {
        $this->smarty->assign("message", $message);
        $this->smarty->assign("url", $url);
        $this->smarty->assign("time", $time);
        $this->smarty->display("Public/jump.html");
        die();
    }
}
