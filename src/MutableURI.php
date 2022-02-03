<?php

namespace osslibs\URI;

interface MutableURI extends URI
{
    /**
     * @param string|null $scheme
     */
    public function setScheme(?string $scheme);

    /**
     * @param string|null $authority
     */
    public function setAuthority(?string $authority);

    /**
     * @param string|null $userInfo
     */
    public function setUserInfo(?string $userInfo);

    /**
     * @param string|null $host
     */
    public function setHost(?string $host);

    /**
     * @param string|null $port
     */
    public function setPort(?string $port);

    /**
     * @param string $path
     */
    public function setPath(string $path);

    /**
     * @param string|null $query
     */
    public function setQuery(?string $query);

    /**
     * @param string|null $fragment
     */
    public function setFragment(?string $fragment);
}
