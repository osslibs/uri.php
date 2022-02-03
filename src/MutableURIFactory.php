<?php

namespace osslibs\URI;

interface MutableURIFactory
{
    public function makeMutableURI(
        ?string $scheme,
        ?string $userInfo,
        ?string $host,
        ?string $port,
        string $path,
        ?string $query,
        ?string $fragment
    ): MutableURI;
}