<?php

namespace osslibs\URI;

use PHPUnit\Framework\TestCase;

class URIObjectTest extends TestCase
{
    public function test()
    {
        $scheme = "scheme";
        $userInfo = "userInfo";
        $host = "host";
        $port = "port";
        $path = "path";
        $query = "query";
        $fragment = "fragment";

        $factory = new URIObjectFactory();
        $uri = $factory->makeURI($scheme, $userInfo, $host, $port, $path, $query, $fragment);

        $this->assertSame($scheme, $uri->getScheme());
        $this->assertSame($userInfo, $uri->getUserInfo());
        $this->assertSame($host, $uri->getHost());
        $this->assertSame($port, $uri->getPort());
        $this->assertSame($path, $uri->getPath());
        $this->assertSame($query, $uri->getQuery());
        $this->assertSame($fragment, $uri->getFragment());
    }
}
