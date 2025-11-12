<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class ValidationExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }
    
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        
        // 处理 MapRequestPayload 验证失败
        if ($exception instanceof ValidationFailedException) {
            $errors = [];
            foreach ($exception->getViolations() as $violation) {
                $property = $violation->getPropertyPath();
                $errors[$property][] = $violation->getMessage();
            }
            
            $response = new JsonResponse([
                'code' => 401,
                'msg' => 'error',
                'errors' => $errors,
            ]);
            
            $event->setResponse($response);
        }
        
        // 处理类型转换错误
        if ($exception instanceof NotNormalizableValueException) {
            $response = new JsonResponse([
                'code' => 401,
                'msg' => $exception->getMessage(),
            ]);
            
            $event->setResponse($response);
        }
    }
}