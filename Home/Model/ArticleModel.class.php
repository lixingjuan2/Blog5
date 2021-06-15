<?php
// 声明命名空间
namespace Home\Model;

use \Frame\Libs\BaseModel;
// 定义最终的文章模型类， 并继承基础模型类
final class ArticleModel extends BaseModel{
    // 受保护的数据表名称
    protected $table = "article2";
    // 获取文章按月份归档的数据
    public function fetchAllWithMonth(){
        // 构建查询的sql语句
        $sql = " SELECT date_format(from_unixtime(addate), '%Y年%m月') AS months, count(id) as records ";
        $sql .= " FROM {$this->table} ";
        $sql .= " GROUP BY months ";
        $sql .= " ORDER BY months desc";
        // 执行sql语句， 并返回结果（二维数组）
        return $this->pdo->fetchAll($sql);
    }

    // 获取连表查询的文章数据
    public function fetchAllWithJoin($where="2>1", $startrow=0, $pagesize=10){
        // 构建查询的sql语句
        $sql = " SELECT article2.*, user2.name, category.classname FROM {$this->table} ";
        $sql .= " LEFT JOIN user2 ON article2.user_id = user2.id ";
        $sql .= " LEFT JOIN category ON article2.category_id = category.id ";
        $sql .= " WHERE {$where} ";
        $sql .= " ORDER BY article2.id DESC ";
        $sql .= " LIMIT {$startrow}, {$pagesize} ";
        // 执行sql语句， 并返回结果（二维数组）
        return $this->pdo->fetchAll($sql);
    }

    // 获取指定id的连表查询的数据
    public function fetchOneWithJoin($where="2>1", $orderby="article2.id ASC"){
        // 构建查询的sql语句
        $sql = " SELECT article2.*, user2.name, category.classname FROM {$this->table} ";
        $sql .= " LEFT JOIN user2 ON article2.user_id=user2.id ";
        $sql .= " LEFT JOIN category ON article2.category_id=category.id ";
        $sql .= " WHERE {$where} ";
        $sql .= " order by {$orderby} ";
        // 执行sql语句， 并返回结果（一维数组）
        return $this->pdo->fetchOne($sql);
    }

    // 更新阅读数
    public function updateRead($id){
        // 构建更新的sql语句
        $sql = " UPDATE {$this->table} SET `read` =  `read`+1 WHERE id= $id ";
        return $this->pdo->exec($sql);
    }
    // 更新阅读数
    public function updatePriaise($id){
        // 构建更新的sql语句
        $sql = " UPDATE {$this->table} SET `priaise` =  `priaise`+1 WHERE id= $id ";
        return $this->pdo->exec($sql);
    }
}