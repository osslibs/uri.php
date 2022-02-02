<?php

namespace osslibs\URI;

interface URIFactory
{
    public function makeURI(
        ?string $scheme,
        ?string $userInfo,
        ?string $host,
        ?string $port,
        string $path,
        ?string $query,
        ?string $fragment
    ): URI;
}