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
namespace App\Exception\Handler;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Kernel\Http\Response;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Exception\HttpException;
use Hyperf\RateLimit\Exception\RateLimitException;
use Hyperf\Validation\ValidationException;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class BusinessExceptionHandler extends ExceptionHandler
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->response = $container->get(Response::class);
        $this->logger = $container->get(StdoutLoggerInterface::class);
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        if ($throwable instanceof HttpException) {
            return $this->response->handleException($throwable);
        }

        if ($throwable instanceof BusinessException) {
            $this->logger->warning(format_throwable($throwable));

            return $this->response->fail($throwable->getCode(), $throwable->getMessage());
        }

        if ($throwable instanceof RateLimitException) {
            $this->logger->warning(format_throwable($throwable));

            return $this->response->fail(503, '当前人数过多,休息一下再来吧');
        }

        // if ($throwable instanceof ValidationException) {
        //     $this->logger->info(format_throwable($throwable));
        //     return $this->response->fail($throwable->getCode(), $throwable->validator->errors()->first());
        // }

        $this->logger->error(format_throwable($throwable));

        return $this->response->fail(ErrorCode::SERVER_ERROR);
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
