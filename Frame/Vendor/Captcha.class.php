<?php
// 声明命名空间
namespace Frame\Vendor;

// 定义最终的图像验证码类
final class Captcha{
    // 私有的成员属性
    private $code;      // 验证码字符串
    private $codelen;   // 验证码的长度
    private $width;     // 画布宽度
    private $height;    // 图像高度
    private $img;       // 图像资源
    private $fontsize;  // 字号大小
    private $fontfile;  // 字体文件

    // 构造方法：对象初始化方法
    public function __construct($codelen=4,$width=85,$height=40,$fontsize=22)
    {
        $this->codelen  = $codelen;
        $this->width    = $width;
        $this->height   = $height;
        $this->fontsize = $fontsize;
        $this->fontfile = "C:\Windows\Fonts\simhei.ttf"; // 系统的绝对路径
        $this->code     = $this->createCode();
        $this->img      = $this->createImg();
        $this->createBg();      // 给画布添加背景
        $this->createText();    // 写入字符串
        $this->outPut();        // 输入图像
    }

    // 私有的生成验证码随机字符串你
    private function createCode(){
        // 产生随机字符串的数组
        $arr_str =array_merge(range('a', 'z'), range(0,9), range('A', 'Z'));
        // 打乱数组
        shuffle($arr_str);
        shuffle($arr_str);
        // 从数组中随机指定个数的下标
        $arr_index = array_rand($arr_str, $this->codelen);
        // 循环下标数组， 构建随机字符串
        $str = "";
        foreach($arr_index as $i){
            $str .= $arr_str[$i];
        }
        // 将验证码字符串存入session
        $_SESSION['captcha'] = $str;
        // 返回随机验证码字符串
        return $str;
    }

    // 私有的创建一个画布
    private function createImg(){
        return imagecreatetruecolor($this->width, $this->height);
    }

    // 私有的画布分配背景色
    private function createBg(){
        // 给矩形分配颜色
        $color = imagecolorallocate($this->img, mt_rand(0, 255), mt_rand(0, 200), mt_rand(0, 255));
        // 绘制带背景的的矩形
        imagefilledrectangle($this->img, 0, 0, $this->width, $this->height, $color);
    }

    // 私有的写入验证码字符串
    private function createText(){
        // 给文本分配颜色
        $color = imagecolorallocate($this->img, mt_rand(100, 255), mt_rand(100, 255), mt_rand(100, 255));
        // 写入字符串到图像上
        imagettftext($this->img, $this->fontsize, 0, 5, 30, $color, $this->fontfile, $this->code);
    }

    // 私有的输入图像
    private function outPut(){
        // 声明输出的内容的mine类型
        header("content-type:image/png");
        // 输出图像
        imagepng($this->img);
        // 销毁图像资源
        imagedestroy($this->img);
    }
 
}
