<?php
namespace App\Set;

use App\BinarySearchTree\BST;

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

class BSTSet implements Set
{
    private $bst;
    public function __construct()
    {
        $this->bst = new BST();
    }
    public function add($e)
    {
        $this->bst->add($e);
    }
    public function contains($e)
    {
        return $this->bst->contains($e);
    }
    public function remove($e)
    {
        $this->bst->remove($e);
    }
    public function getSize()
    {
        return $this->bst->getSize();
    }
    public function isEmpty()
    {
        return $this->bst->isEmpty();
    }
}
