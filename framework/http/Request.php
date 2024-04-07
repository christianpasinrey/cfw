<?php

namespace Cfw\Http;

class Request
{
    public function __construct(
        public readonly string $uri,
        public readonly string $method,
        public readonly string $query,
        public readonly array $params,
        public readonly array $body,
        public readonly array $cookies,
        public readonly array $files,
        // public readonly array $server,
    ) {
    }

    public static function createFromGlobals(): static
    {
        static::handleSession();
        return new static(
            uri: $_SERVER['REQUEST_URI'],
            method: $_SERVER['REQUEST_METHOD'],
            query: $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '',
            params: $_GET,
            body: $_POST,
            cookies: $_COOKIE,
            files: $_FILES,
            // server: $_SERVER
        );
    }

    public static function handleSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            $_COOKIE['PHPSESSNAME'] = session_name();
            $_COOKIE['PHPSESSID'] = session_id();
        }
    }
}
