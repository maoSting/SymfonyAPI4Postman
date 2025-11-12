<?php

namespace App\Controller\upload;

use App\Controller\upload\dto\GoodDto;
use App\Controller\upload\dto\ProductDto;
use App\Kernel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/file', name: 'file')]
#[AsController]
class File
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
            'msg' => 'ok',
        ]);
    }
    
    #[Route('/show/{id}-{sku}', methods: ['GET', 'HEAD'])]
    public function show(int $id, string $sku): Response
    {
        return new JsonResponse([
            'code' => 200,
            'msg' => 'ok',
            'date' => [
                'id' => $id,
                'sku' => $sku,
            ],
        ]);
    }
    
    
    /**
     * get product detail
     *
     * @param \App\Entity\ProductDto $product
     * @return Response
     */
    #[Route('/product', name: 'product', methods: ['POST'], utf8: true)]
    public function product(
        #[MapRequestPayload] \App\Entity\ProductDto $product,
    ): Response
    {
        return new Response('product bb');
    }
    
    
    /**
     * 查看商品详情
     *
     * @param GoodDto $good
     * @return Response
     */
    #[Route('/good/{id}', name: 'good', methods: ['POST'])]
    public function good(
        int                          $id,
        #[MapRequestPayload] GoodDto $good,
    ): Response
    {
        return new Response('product bb');
    }
}