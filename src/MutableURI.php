<?php

namespace osslibs\URI;

interface MutableURI extends URI
{
    public function setScheme(?string $scheme);

    public function setAuthority(?string $authority);

    public function setUserInfo(?string $userInfo);

    public function setHost(?string $host);

    public function setPort(?string $port);

    public function setPath(string $path);

    public function setQuery(?string $query);

    public function setFragment(?string $fragment);
}
