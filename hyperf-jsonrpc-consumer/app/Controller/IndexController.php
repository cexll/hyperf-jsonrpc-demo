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

use App\Rpc\CalculatorServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\RateLimit\Annotation\RateLimit;

/**
 * @AutoController
 */
class IndexController extends AbstractController
{
    /**
     * @Inject
     * @var CalculatorServiceInterface
     */
    private $calculatorService;

    /**
     * @RateLimit(create=100, consume=100, capacity=1000, waitTimeout=5)
     */
    public function index()
    {
        return $this->calculatorService->add(1, 2);
    }
}
