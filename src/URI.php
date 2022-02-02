<?php

namespace osslibs\URI;

interface URI
{
    public function getScheme(): ?string;

    public function getAuthority(): ?string;

    public function getUserInfo(): ?string;

    public function getHost(): ?string;

    public function getPort(): ?string;

    public function getPath(): string;

    public function getQuery(): ?string;

    public function getFragment(): ?string;
}
