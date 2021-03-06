<?php
// 后端端配置数组
return array(
    // 数据库配置
    'db_type'       =>  'mysql',            // 数据库类型
    'db_host'       =>  'localhost',        // 主机名
    'db_port'       =>  '3306',             // 端口号
    'db_user'       =>  'root',             // 用户名
    'db_pass'       =>  'root',           // 密码
    'db_name'       =>  'blog',           // 数据库名
    'charset'       =>  'utf8',             // 字符集

    // 后端默认url路由参数
    'default_platform'      =>  'Admin',    // 默认应用
    'default_controller'    =>  'Index',    // 默认控制器
    'default_action'        =>  'index',    // 默认动作
);