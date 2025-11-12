<?php

namespace App\Controller;

use App\Kernel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/update', name: 'update')]
class Update
{
    
    /**
     * 测试注释
     *
     * @return Response
     */
    #[Route('/test', name: 'test', methods: ['GET'])]
    public function test(): Response
    {
        return new JsonResponse([
            'code' => 200,
            'msg' => 'success'
        ]);
    }
}