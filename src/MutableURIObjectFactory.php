<?php

namespace osslibs\URI;

class MutableURIObjectFactory implements MutableURIFactory
{
    public function makeMutableURI(?string $scheme, ?string $userInfo, ?string $host, ?string $port, string $path, ?string $query, ?string $fragment): MutableURI
    {
        return new MutableURIObject($scheme, $userInfo, $host, $port, $path, $query, $fragment);
    }
}
