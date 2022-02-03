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

    public function testMergeAbsolute()
    {
        $uri = uri("http://a/b/c/d")->merge("/x/y/z");
        $this->assertSame("http://a/x/y/z", (string)$uri);
    }

    public function testMergeRelativeFile()
    {
        $uri = uri("http://a/b/c/d")->merge("x/y/z");
        $this->assertSame("http://a/b/c/x/y/z", (string)$uri);
    }

    public function testMergeRelativeDir()
    {
        $uri = uri("http://a/b/c/d/")->merge("x/y/z");
        $this->assertSame("http://a/b/c/d/x/y/z", (string)$uri);
    }
}
