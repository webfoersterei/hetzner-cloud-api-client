<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 24.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Exception;


use Webfoersterei\HetznerCloudApiClient\Model\Error;

class ErrorResponseException extends ApiException
{
    /**
     * @var Error
     */
    private $error;

    /**
     * @return Error
     */
    public function getError(): Error
    {
        return $this->error;
    }

    /**
     * @param Error $error
     * @return ErrorResponseException
     */
    public function setError(Error $error): ErrorResponseException
    {
        $this->error = $error;
        return $this;
    }

}