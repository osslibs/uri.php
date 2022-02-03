<?php

namespace osslibs\URI;

interface URI
{
    /**
     * @return string|null
     */
    public function getScheme(): ?string;

    /**
     * @return string|null
     */
    public function getAuthority(): ?string;

    /**
     * @return string|null
     */
    public function getUserInfo(): ?string;

    /**
     * @return string|null
     */
    public function getHost(): ?string;

    /**
     * @return string|null
     */
    public function getPort(): ?string;

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @return string|null
     */
    public function getQuery(): ?string;

    /**
     * @return string|null
     */
    public function getFragment(): ?string;

    /**
     * @param string|URI $uri
     * @return URI
     */
    public function merge($uri): URI;
}
