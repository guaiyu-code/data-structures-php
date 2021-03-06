<?php
namespace App\Queue;
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
interface Queue
{
    public function getSize();
    public function isEmpty();
    public function enqueue($e);
    public function dequeue();
    public function getFront();
}
