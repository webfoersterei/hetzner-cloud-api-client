<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 24.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Exception;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiException extends Exception
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @param RequestInterface $request
     * @return ApiException
     */
    public function setRequest(RequestInterface $request): ApiException
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     * @return ApiException
     */
    public function setResponse(ResponseInterface $response): ApiException
    {
        $this->response = $response;
        return $this;
    }
}