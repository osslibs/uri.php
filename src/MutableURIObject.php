<?php

namespace osslibs\URI;

use Exception;

class MutableURIObject implements MutableURI
{
    use URITrait;

    public function setScheme(?string $scheme)
    {
        $this->scheme = $scheme;
    }

    public function setAuthority(?string $authority)
    {
        throw new Exception("Not yet implemented");
    }

    public function setUserInfo(?string $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    public function setHost(?string $host)
    {
        $this->host = $host;
    }

    public function setPort(?string $port)
    {
        $this->port = $port;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function setQuery(?string $query)
    {
        $this->query = $query;
    }

    public function setFragment(?string $fragment)
    {
        $this->fragment = $fragment;
    }
}
