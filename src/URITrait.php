<?php

namespace osslibs\URI;

trait URITrait
{
    /**
     * @var string|null
     */
    private $scheme;

    /**
     * @var string|null
     */
    private $userInfo;

    /**
     * @var string|null
     */
    private $host;

    /**
     * @var string|null
     */
    private $port;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string|null
     */
    private $query;

    /**
     * @var string|null
     */
    private $fragment;

    public function __construct(?string $scheme, ?string $userInfo, ?string $host, ?string $port, string $path, ?string $query, ?string $fragment)
    {
        $this->scheme = $scheme;
        $this->userInfo = $userInfo;
        $this->host = $host;
        $this->port = $port;
        $this->path = $path;
        $this->query = $query;
        $this->fragment = $fragment;
    }

    public function __toString()
    {
        return uri_stringify($this);
    }

    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    public function getUserInfo(): ?string
    {
        return $this->userInfo;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function getAuthority(): ?string
    {
        return uri_authority($this);
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function getFragment(): ?string
    {
        return $this->fragment;
    }

    public function merge(URI $uri): URI
    {
        return uri_merge($this, $uri);
    }
}