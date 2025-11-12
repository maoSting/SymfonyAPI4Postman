<?php

namespace App\Controller\upload\dto;

use Symfony\Component\Validator\Constraints as Assert;

class GoodDto
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 10, max: 500)]
    public readonly string $good_id;
    
    #[Assert\NotBlank]
    #[Assert\Length(min: 10, max: 500)]
    public readonly string $comment;
    
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(5)]
    public readonly int $rating;
    
}