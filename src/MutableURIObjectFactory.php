<?php

namespace osslibs\URI;

class MutableURIObjectFactory implements URIFactory
{
    public function makeURI(?string $scheme, ?string $userInfo, ?string $host, ?string $port, string $path, ?string $query, ?string $fragment): URI
    {
        return new MutableURIObject($scheme, $userInfo, $host, $port, $path, $query, $fragment);
    }
}