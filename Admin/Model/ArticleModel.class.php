<?php
// 声明命名空间
namespace Admin\Model;

use \Frame\Libs\BaseModel;

// 定义最终的文章模型类， 并继承基础模型类
final class ArticleModel extends BaseModel
{
    // 受保护的数据表名称
    protected $table = "article2";

    // 获取连表查询的多行数据
    public function fetchAllWithJoin($where = "2>1", $startrow = 0, $pagesize = 10)
    {
        // 构建连表查询的sql语句
        $sql = "SELECT article2.*, category.classname, user2.username FROM article2 LEFT JOIN category ON 
        article2.category_id=category.id LEFT JOIN user2 ON article2.user_id = user2.id ";
        $sql .= " WHERE {$where} ";
        $sql .= " order BY article2.id DESC ";

        $sql .= "LIMIT {$startrow}, {$pagesize}";
        
        // 执行sql语句， 并返回结果（二维数组）
        return $this->pdo->fetchAll($sql);
    }
}
