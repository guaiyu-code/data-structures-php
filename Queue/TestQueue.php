<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
include_once "ArrayQueue.php";
include_once "LoopQueue.php";
include_once "LinkedListQueue.php";
class TestQueue
{
    public static function test($queue,$count){
        $startTime = microtime(true);
        for( $i = 0 ; $i < $count ; $i ++){
            $queue->enqueue(mt_rand(0,999));
        }
            
        for( $i = 0 ; $i < $count ; $i ++){
            $queue->dequeue();
        }
        $endTime = microtime(true);
        return ($endTime - $startTime);
    }
    public static function mainQueue(){
        $count = 10000;
        $arrqueue = new ArrayQueue();
        $t1 = self::test($arrqueue,$count);//7.937704086303
        
        $loopqueue = new LoopQueue();
        $t2 = self::test($loopqueue,$count);
        $linkedListQueue = new LinkedListQueue();
        $t3 = self::test($linkedListQueue,$count);
        echo("\ntl---".$t1);
        echo("\nt2---".$t2);
        echo("\nt2---".$t3);
    }
}
TestQueue::mainQueue();