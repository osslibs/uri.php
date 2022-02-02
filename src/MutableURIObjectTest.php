<?php

namespace osslibs\URI;

use PHPUnit\Framework\TestCase;

class MutableURIObjectTest extends TestCase
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

        $factory = new MutableURIObjectFactory();
        $uri = $factory->makeURI($scheme, $userInfo, $host, $port, $path, $query, $fragment);

        $this->assertSame($scheme, $uri->getScheme());
        $this->assertSame($userInfo, $uri->getUserInfo());
        $this->assertSame($host, $uri->getHost());
        $this->assertSame($port, $uri->getPort());
        $this->assertSame($path, $uri->getPath());
        $this->assertSame($query, $uri->getQuery());
        $this->assertSame($fragment, $uri->getFragment());

        $uri->setScheme(strtoupper($scheme));
        $uri->setUserInfo(strtoupper($userInfo));
        $uri->setHost(strtoupper($host));
        $uri->setPort(strtoupper($port));
        $uri->setPath(strtoupper($path));
        $uri->setQuery(strtoupper($query));
        $uri->setFragment(strtoupper($fragment));

        $this->assertSame(strtoupper($scheme), $uri->getScheme());
        $this->assertSame(strtoupper($userInfo), $uri->getUserInfo());
        $this->assertSame(strtoupper($host), $uri->getHost());
        $this->assertSame(strtoupper($port), $uri->getPort());
        $this->assertSame(strtoupper($path), $uri->getPath());
        $this->assertSame(strtoupper($query), $uri->getQuery());
        $this->assertSame(strtoupper($fragment), $uri->getFragment());
    }
}
