<?php

namespace App\BinarySearchTree;

/**
 * Copyright (c) 2019 - XuShuHui
 * Author: XuShuHui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
class Node
{
    public $left;
    public $right;
    public $e;

    public function __construct($e)
    {
        $this->e = $e;
        $this->left = null;
        $this->right = null;
    }
}

class BST
{
    private $root;
    private $size;
    public static $res;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    // 向二分搜索树中添加新的元素e
    public function add($e)
    {
        $this->root = $this->addNode($this->root, $e);
    }
    // 向以node为根的二分搜索树中插入元素e，递归算法
    // 返回插入新节点后二分搜索树的根
    private function addNode($node, $e)
    {
        if ($node == null) {
            $this->size++;
            return new Node($e);
        }
        if ($e < $node->e) {
            $node->left = $this->addNode($node->left, $e);
        } elseif ($e > $node->e) {
            $node->right = $this->addNode($node->right, $e);
        }
        return $node;
    }

    // 看二分搜索树中是否包含元素e
    public function contains($e)
    {
        return $this->containsNode($this->root, $e);
    }

    // 看以node为根的二分搜索树中是否包含元素e, 递归算法
    private function containsNode($node, $e)
    {
        if ($node == null) {
            return false;
        }
        if ($e < $node->e) {
            return $this->containsNode($node->left, $e);
        } elseif ($e > $node->e) {
            return $this->containsNode($node->right, $e);
        } else {
            return true;
        }
    }

    // 二分搜索树的前序遍历
    public function preOrder()
    {
        $this->preOrderNode($this->root);
    }

    // 前序遍历以node为根的二分搜索树, 递归算法
    private function preOrderNode($node)
    {
        if ($node == null) {
            return;
        }
        echo $node->e;
        $this->preOrderNode($node->left);
        $this->preOrderNode($node->right);
    }

    // 二分搜索树的非递归前序遍历
    public function preOrderNR()
    {
        if ($this->root == null) {
            return;
        }
        //借助php原生栈实现
        $stack = new \SplStack();
        $stack->push($this->root);
        while (!$stack->isEmpty()) {
            $cur = $stack->pop();
            echo $cur->e;
            if ($cur->right != null) {
                $stack->push($cur->right);
            }
            if ($cur->left != null) {
                $stack->push($cur->left);
            }
        }
    }

    // 二分搜索树的中序遍历
    public function inOrder()
    {
        $this->inOrderNode($this->root);
    }

    // 中序遍历以node为根的二分搜索树, 递归算法
    private function inOrderNode($node)
    {
        if ($node == null) {
            return;
        }
        $this->inOrderNode($node->left);
        echo $node->e;
        $this->inOrderNode($node->right);
    }

    // 二分搜索树的后序遍历
    public function postOrder()
    {
        $this->postOrderNode($this->root);
    }

    // 后序遍历以node为根的二分搜索树, 递归算法
    private function postOrderNode($node)
    {
        if ($node == null) {
            return;
        }
        $this->postOrderNode($node->left);
        $this->postOrderNode($node->right);
        echo $node->e;
    }

    // 二分搜索树的层序遍历
    public function levelOrder()
    {
        if ($this->root == null) {
            return;
        }
        $queue = new \SplQueue();
        $queue->enqueue($this->root);
        while (!$queue->isEmpty()) {
            $cur = $queue->dequeue();
            echo $cur->e;
            if ($cur->left != null) {
                $queue->enqueue($cur->left);
            }
            if ($cur->right != null) {
                $queue->enqueue($cur->right);
            }
        }
    }

    // 寻找二分搜索树的最小元素
    public function minimum()
    {
        if ($this->size == 0) {
            throw new \Exception("BST is empty");
        }
        $minNode = $this->minimumNode($this->root);
        return $minNode->e;
    }

    // 返回以node为根的二分搜索树的最小值所在的节点
    private function minimumNode($node)
    {
        if ($node->left == null) {
            return $node;
        }
        return $this->minimumNode($node->left);
    }

    // 寻找二分搜索树的最大元素
    public function maximum()
    {
        if ($this->size == 0) {
            throw new \Exception("BST is empty");
        }
        $maxNode = $this->maximumNode($this->root);
        return $maxNode->e;
    }

    // 返回以node为根的二分搜索树的最大值所在的节点
    private function maximumNode($node)
    {
        if ($node->right == null) {
            return $node;
        }
        return $this->maximumNode($node->right);
    }

    // 从二分搜索树中删除最小值所在节点, 返回最小值
    public function removeMin()
    {
        $ret = $this->minimum();
        $this->root = $this->removeMinNode($this->root);
        return $ret;
    }
    // 删除掉以node为根的二分搜索树中的最小节点
    // 返回删除节点后新的二分搜索树的根
    public function removeMinNode($node)
    {
        if ($node->left == null) {
            $rightNode = $node->right;
            $node->right = null;
            $this->size--;
            return $rightNode;
        }
        $node->left = $this->removeMinNode($node->left);
        return $node;
    }

    // 从二分搜索树中删除最大值所在节点
    public function removeMax()
    {
        $ret = 8;
        $this->root = $this->removeMaxNode($this->root);
        return $ret;
    }
    // 删除掉以node为根的二分搜索树中的最大节点
    // 返回删除节点后新的二分搜索树的根
    public function removeMaxNode($node)
    {
        if ($node->right == null) {
            $leftNode = $node->left;
            $node->left = null;
            $this->size--;
            return $leftNode;
        }
        $node->right = $this->removeMaxNode($node->right);
        return $node;
    }

    // 从二分搜索树中删除元素为e的节点
    public function remove($e)
    {
        $this->root = $this->removeNode($this->root, $e);
    }
    // 删除掉以node为根的二分搜索树中值为e的节点, 递归算法
    // 返回删除节点后新的二分搜索树的根
    private function removeNode($node, $e)
    {
        if ($node == null) {
            return null;
        }
        if ($e < $node->e) {
            $node->left = $this->removeNode($node->left, $e);
            return $node;
        } elseif ($e > $node->e) {
            $node->right = $this->removeNode($node->right, $e);
            return $node;
        } else { //$e == $node->e

            // 待删除节点左子树为空的情况
            if ($node->left == null) {
                $rightNode = $node->right;
                $node->right = null;
                $this->size--;
                return $rightNode;
            }
            // 待删除节点右子树为空的情况
            if ($node->right == null) {
                $leftNode = $node->left;
                $node->left = null;
                $this->size--;
                return $leftNode;
            }
            // 待删除节点左右子树均不为空的情况
            // 找到比待删除节点大的最小节点, 即待删除节点右子树的最小节点
            // 用这个节点顶替待删除节点的位置
            $successor = $this->minimumNode($node->right);
            $successor->right = $this->removeMinNode($node->right);
            $successor->left = $node->left;
            $node->left = $node->right = null;
            return $successor;
        }
    }

    public function __toString()
    {
        $this->generateBSTString($this->root, 0);
        return static::$res;
    }

    // 生成以node为根节点，深度为depth的描述二叉树的字符串
    private function generateBSTString($node, int $depth)
    {
        if ($node == null) {
            static::$res .= $this->generateDepthString($depth) . "null\n";
            return;
        }
        static::$res .= $this->generateDepthString($depth) . $node->e . "\n";
        $this->generateBSTString($node->left, $depth + 1);
        $this->generateBSTString($node->right, $depth + 1);
    }

    private function generateDepthString($depth)
    {
        $str = '';
        for ($i = 0; $i < $depth; $i++) {
            $str .= '--';
        }
        return $str;
    }
}
