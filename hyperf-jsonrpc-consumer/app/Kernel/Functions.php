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
use Hyperf\ExceptionHandler\Formatter\FormatterInterface;
use Hyperf\Utils\ApplicationContext;

if (! function_exists('di')) {
    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param null|string $id
     * @return mixed|\Psr\Container\ContainerInterface
     */
    function di($id = null)
    {
        $container = ApplicationContext::getContainer();
        if ($id) {
            return $container->get($id);
        }

        return $container;
    }
}

if (! function_exists('format_throwable')) {
    /**
     * Push a job to async queue.
     */
    function format_throwable(Throwable $throwable): string
    {
        return di()->get(FormatterInterface::class)->format($throwable);
    }
}

// if (! function_exists('queue_push')) {
//     function queue_push(JobInterface $job, int $delay = 0, string $key = 'defalut'): bool
//     {
//         $driver = di()->get(DriverFactory::class)->get($key);
//         return $driver->push($job, $delay);
//     }
// }

// function create_random_string($random_length)
// {
//     $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
//     $random_string = '';
//     for ($i = 0; $i < $random_length; ++$i) {
//         $random_string .= $chars[mt_rand(0, strlen($chars) - 1)];
//     }
//     return $random_string;
// }
