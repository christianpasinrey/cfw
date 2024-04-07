<?php

namespace Cfw\Http;

class Response
{
    public function __construct(
        private ?string $content = '',
        private int $status = 200,
        private array $headers = [],
    ) {
    }

    public function setContent(string|callable $content): void
    {
        $this->content = $content;
    }

    public function send(): void
    {
        http_response_code($this->status);
        foreach ($this->headers as $header) {
            header($header);
        }
        echo $this->content;
    }

    public function json(array $data): void
    {
        $this->headers[] = 'Content-Type: application/json';
        $this->content = json_encode($data);

        $this->send();
    }
}
