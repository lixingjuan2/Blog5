<?php
// 声明命名空间
namespace Home\Controller;

use \Frame\Libs\BaseController;
use \Home\Model\LinksModel;
use \Home\Model\CategoryModel;
use \Home\Model\ArticleModel;

// 定义最终的首页控制器类， 并继承基础控制器类
final class IndexController extends BaseController
{
    // 显示前端首页
    public function index()
    {
        // (1)获取友情链接数据
        $links = LinksMOdel::getInstance()->fetchAll();

        // (2)获取无限级分类的数据
        $categorys = CategoryModel::getInstance()->categoryList(
            // 获取文章数的原始分类数据
            CategoryModel::getInstance()->fetchAllWithCount()
        );

        // （3）获取文章按月份归档数据
        $months = ArticleModel::getInstance()->fetchAllWithMonth();

        // (4)构建搜索的条件
        $where = "2>1";
        if (!empty($_POST['title'])) {
            $where .= " AND title like '%" . $_REQUEST['title'] . "%'";
        }
        if (!empty($_GET['category_id'])) $where .= " AND category_id =" . $_GET['category_id'];

        // (5) 构建分页的参数
        $pagesize   = 5;                                            # 每页总记录数
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;     # 当前页码
        $startrow   = ($page - 1) * $pagesize;                          # 记录开始行（从哪里偏移）
        $records    = ArticleModel::getInstance()->rowCount($where);      # 数据库总记录数
        $params     = array(                                        # 地址栏参数
            'c'     => CONTROLLER,
            'a'     => ACTION,
        );
        if (!empty($_REQUEST['title'])) $params['title'] = $_REQUEST['title'];
        if (!empty($_REQUEST['category_id'])) $params['category_id'] = $_REQUEST['category_id'];

        // (6)获取分页的字符串
        $pageObj = new \Frame\Vendor\Pager($records, $pagesize, $page, $params);
        $pageStr = $pageObj->showPage();


        // (7) 获取文章连表查询的分页数据
        $articles = ArticleModel::getInstance()->fetchAllWithJoin($where, $startrow, $pagesize);


        // (8)向视图赋值， 并显示视图
        $this->smarty->assign(array(
            'links'     => $links,
            'categorys' => $categorys,
            'months'    => $months,
            'articles'  => $articles,
            'pageStr'   => $pageStr,
        ));
        $this->smarty->display("Index/index.html");
    }

    // 显示前端列表页
    public function showList()
    {
        // (1)获取友情链接数据
        $links = LinksMOdel::getInstance()->fetchAll();

        // (2)获取无限级分类的数据
        $categorys = CategoryModel::getInstance()->categoryList(
            // 获取文章数的原始分类数据
            CategoryModel::getInstance()->fetchAllWithCount()
        );

        // （3）获取文章按月份归档数据
        $months = ArticleModel::getInstance()->fetchAllWithMonth();

        // (4)构建搜索的条件
        $where = "2>1";
        if (!empty($_POST['title'])) {
            $where .= " AND title like '%" . $_REQUEST['title'] . "%'";
        }
        if (!empty($_GET['category_id'])) $where .= " AND category_id =" . $_GET['category_id'];

        // (5) 构建分页的参数
        $pagesize   = 18;                                            # 每页总记录数
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;     # 当前页码
        $startrow   = ($page - 1) * $pagesize;                          # 记录开始行（从哪里偏移）
        $records    = ArticleModel::getInstance()->rowCount($where);      # 数据库总记录数
        $params     = array(                                        # 地址栏参数
            'c'     => CONTROLLER,
            'a'     => ACTION,
        );
        if (!empty($_REQUEST['title'])) $params['title'] = $_REQUEST['title'];
        if (!empty($_REQUEST['category_id'])) $params['category_id'] = $_REQUEST['category_id'];

        // (6)获取分页的字符串
        $pageObj = new \Frame\Vendor\Pager($records, $pagesize, $page, $params);
        $pageStr = $pageObj->showPage();


        // (7) 获取文章连表查询的分页数据
        $articles = ArticleModel::getInstance()->fetchAllWithJoin($where, $startrow, $pagesize);


        // (8)向视图赋值， 并显示视图
        $this->smarty->assign(array(
            'links'     => $links,
            'categorys' => $categorys,
            'months'    => $months,
            'articles'  => $articles,
            'pageStr'   => $pageStr,
        ));
        // 向视图赋值， 并显示视图
        $this->smarty->display("Index/list.html");
    }

    // 显示详细内容
    public function content()
    {
        // (1)获取友情链接数据
        $links = LinksMOdel::getInstance()->fetchAll();

        // (2)获取无限级分类的数据
        $categorys = CategoryModel::getInstance()->categoryList(
            // 获取文章数的原始分类数据
            CategoryModel::getInstance()->fetchAllWithCount()
        );

        // （3）获取文章按月份归档数据
        $months = ArticleModel::getInstance()->fetchAllWithMonth();

        // (4)构建搜索的条件
        $where = "2>1";
        if (!empty($_POST['title'])) {
            $where .= " AND title like '%" . $_REQUEST['title'] . "%'";
        }
        if (!empty($_GET['category_id'])) $where .= " AND category_id =" . $_GET['category_id'];

        // (5) 构建分页的参数
        $pagesize   = 18;                                            # 每页总记录数
        $page       = isset($_GET['page']) ? $_GET['page'] : 1;     # 当前页码
        $startrow   = ($page - 1) * $pagesize;                          # 记录开始行（从哪里偏移）
        $records    = ArticleModel::getInstance()->rowCount($where);      # 数据库总记录数
        $params     = array(                                        # 地址栏参数
            'c'     => CONTROLLER,
            'a'     => ACTION,
        );
        if (!empty($_REQUEST['title'])) $params['title'] = $_REQUEST['title'];
        if (!empty($_REQUEST['category_id'])) $params['category_id'] = $_REQUEST['category_id'];

        // (6)获取分页的字符串
        $pageObj = new \Frame\Vendor\Pager($records, $pagesize, $page, $params);
        $pageStr = $pageObj->showPage();


        // (7) 获取文章连表查询的分页数据
        $articles = ArticleModel::getInstance()->fetchAllWithJoin($where, $startrow, $pagesize);
        $id = $_GET['id'];
       
        // (2)更新文章阅读数
        ArticleModel::getInstance()->updateRead($id);

        // （1）获取指定id的连表查询的文章数据
        $article = ArticleModel::getInstance()->fetchOneWithJoin("article2.id=$id");

        // (3) 获取上一篇和下一篇文章
        $arr[]  = ArticleModel::getInstance()->fetchOneWithJoin("article2.id<$id", "article2.id desc");
        $arr[]  = ArticleModel::getInstance()->fetchOneWithJoin("article2.id>$id", "article2.id ASC");

        // (8)向视图赋值， 并显示视图
        $this->smarty->assign(array(
            'links'     => $links,
            'categorys' => $categorys,
            'months'    => $months,
            'articles'  => $articles,
            'pageStr'   => $pageStr,
            'article'  => $article,
            'arr'      => $arr
        ));
       


        // 向视图赋值， 并显示视图
        $this->smarty->display("Index/content.html");
    }

    // 点赞方法
    public function priaise(){
        $id = $_GET['id'];
        // 判断用户是否登陆
        if(isset($_SESSION['username'])){
            // 判断当前文章是否点赞过
            if(!isset($_SESSION['priaise'][$id])){
                // 更改当前id状态
                $_SESSION['priaise'][$id] = 1;
                // 更新点赞数
                ArticleModel::getInstance()->updatePriaise($id);
                // 跳回到原地址
                $this->jump("点赞成功！", "?c=Index&a=Index&a=content&id=$id");
            }else{
                // 如果点赞过， 不能再次点在
                $this->jump("同一篇文章只能点赞一次！", "?c=Index&a=Index&a=content&id=$id");
            }
        }else{
            // 跳转到后台登陆
            $this->jump("必须是登陆用户才能点赞", "admin.php?c=User&a=login");
        }
    }
}
