<?php

namespace Fawzanm\Pushy\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError($response)
    {
        return new static("PushyException : Cannot send notification.");
    }
}
