<?php

namespace osslibs\URI;

class URIObjectFactory implements URIFactory
{
    public function makeURI(?string $scheme, ?string $userInfo, ?string $host, ?string $port, string $path, ?string $query, ?string $fragment): URI
    {
        return new URIObject($scheme, $userInfo, $host, $port, $path, $query, $fragment);
    }
}