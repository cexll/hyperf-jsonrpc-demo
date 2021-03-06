<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\RateLimit\Annotation\RateLimit;

/**
 * @Controller(prefix="test")
 */
class TestController
{
    /**
     * @RequestMapping(path="test")
     * @RateLimit(create=1, capacity=3)
     */
    public function test()
    {
        return ['QPS 1, 峰值3'];
    }

    /**
     * @RequestMapping(path="test2")
     * @RateLimit(create=2, capacity=2, capacity=4)
     */
    public function test2()
    {
        return ['QPS 2, 峰值4'];
    }
}
