<?php
namespace App\LinkedList;
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
class TestLinkedList
{
    public function __construct()
    {
        $link = new LinkedList();
        for ($i = 1; $i < 5; $i++) {
            $link->addFirst($i);
        }
        $link->set(2, 6666);
        echo($link);
// $link->addFirst(1);

// $link->addFirst(2);
// echo ($link);
    }
}

