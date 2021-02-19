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
namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("服务器走丢啦")
     */
    const SERVER_ERROR = 500;

    /**
     * @Message("当前人数过多,休息一下再来吧")
     */
    const RATE_LIMIT_ERROR = 503;

    /**
     * @Message("Token 已失效")
     */
    const TOKEN_INVALID = 700;

    /**
     * @Message("越权操作")
     */
    const OPERATION_INVALID = 701;

    /**
     * @Message("参数非法")
     */
    const PARAMS_INVALID = 1000;
}
