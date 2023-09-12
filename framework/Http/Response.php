<?php
 
declare(strict_types=1);

namespace Suraj\Framework\Http;

class Response
{

    public function __construct(
        public ?string $content,
        public int $status = 200,
        public array $header = []
    ) {
    }

    public function send(): void
    {
      echo $this->content;
    }
}