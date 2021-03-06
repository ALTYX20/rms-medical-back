<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Serializer\Normalizer;

use FOS\RestBundle\Util\ExceptionValueMap;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Ener-Getick <egetick@gmail.com>
 *
 * @internal do not use this class in your code
 */
class AbstractExceptionNormalizer
{
    /**
     * @var ExceptionValueMap
     */
    private $messagesMap;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @param array $messagesMap
     * @param bool  $debug
     */
    public function __construct(ExceptionValueMap $messagesMap, $debug)
    {
        $this->messagesMap = $messagesMap;
        $this->debug = $debug;
    }

    /**
     * Extracts the exception message.
     *
     * @param \Throwable $throwable
     * @param int|null   $statusCode
     *
     * @return string
     */
    protected function getMessageFromThrowable(\Throwable $throwable, $statusCode = null)
    {
        $showMessage = $this->messagesMap->resolveThrowable($throwable);

        if ($showMessage || $this->debug) {
            return $throwable->getMessage();
        }

        return array_key_exists($statusCode, Response::$statusTexts) ? Response::$statusTexts[$statusCode] : 'error';
    }
}
