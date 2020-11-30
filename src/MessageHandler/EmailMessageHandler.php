<?php

namespace App\MessageHandler;

use App\Message\EmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class EmailMessageHandler implements MessageHandlerInterface
{
    public function __invoke(EmailMessage $message)
    {
        // do something with your message
    }
}
