<?php

namespace osslibs\URI;

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function dataPrefix()
    {
        return [
            [null, null, null],
            ["a", null, null],
            [null, "b", "b"],
            ["a", "b", "ab"],

            ["", "", ""],
            ["a", "", "a"],
            ["", "b", "b"],
            ["a", "b", "ab"],
        ];
    }

    /**
     * @dataProvider dataPrefix
     * @param string|null $prefix
     * @param string|null $string
     * @param string|null $expect
     */
    public function testPrefix(?string $prefix, ?string $string, ?string $expect)
    {
        $this->assertSame($expect, prefix($prefix, $string));
    }

    public function dataPostfix()
    {
        return [
            [null, null, null],
            ["a", null, "a"],
            [null, "b", null],
            ["a", "b", "ab"],

            ["", "", ""],
            ["a", "", "a"],
            ["", "b", "b"],
            ["a", "b", "ab"],
        ];
    }

    /**
     * @dataProvider dataPostfix
     * @param string|null $string
     * @param string|null $postfix
     * @param string|null $expect
     */
    public function testPostfix(?string $string, ?string $postfix, ?string $expect)
    {
        $this->assertSame($expect, postfix($string, $postfix));
    }

    public function dataParse()
    {
        return [
            ["http://user:pass@domain/a/b/c?x=X&y=Y#z", "http", "user:pass@domain", "user:pass", "domain", null, "/a/b/c", "x=X&y=Y", "z"],
            ["https://user:pass@domain/a/b/c?x=X&y=Y#z", "https", "user:pass@domain", "user:pass", "domain", null, "/a/b/c", "x=X&y=Y", "z"],
            ["mailto:user@domain?subject=some subject", "mailto", null, null, null, null, "user@domain", "subject=some subject", null],
            ["//user:pass@domain/a/b/c?x=X&y=Y#z", null, "user:pass@domain", "user:pass", "domain", null, "/a/b/c", "x=X&y=Y", "z"],
            ["/a/b/c?x=X&y=Y#z", null, null, null, null, null, "/a/b/c", "x=X&y=Y", "z"],
            ["/a/b/c", null, null, null, null, null, "/a/b/c", null, null],
            ["a/b/c", null, null, null, null, null, "a/b/c", null, null],
            ["user@domain", null, null, null, null, null, "user@domain", null, null],
            ["file:///a/b/c", "file", "", null, "", null, "/a/b/c", null, null],
            ["about:config", "about", null, null, null, null, "config", null, null],
            ["foo://example.com:8042/over/there?name=ferret#nose", "foo", "example.com:8042", null, "example.com", "8042", "/over/there", "name=ferret", "nose"],
            ["foo://user@example.com:8042/over/there?name=ferret#nose", "foo", "user@example.com:8042", "user", "example.com", "8042", "/over/there", "name=ferret", "nose"],
            ["foo://user:pass@example.com:8042/over/there?name=ferret#nose", "foo", "user:pass@example.com:8042", "user:pass", "example.com", "8042", "/over/there", "name=ferret", "nose"],
            ["urn:example:animal:ferret:nose", "urn", null, null, null, null, "example:animal:ferret:nose", null, null],
            ["URN:example:animal:ferret:nose", "URN", null, null, null, null, "example:animal:ferret:nose", null, null, "URN:example:animal:ferret:nose"],
        ];
    }

    /**
     * @dataProvider dataParse
     * @param string $string
     * @param string|null $scheme
     * @param string|null $authority
     * @param string|null $userInfo
     * @param string|null $host
     * @param string|null $port
     * @param string $path
     * @param string|null $query
     * @param string|null $fragment
     * @param string|null $normalized
     */
    public function testParse(string $string, ?string $scheme, ?string $authority, ?string $userInfo, ?string $host, ?string $port, string $path, ?string $query, ?string $fragment, ?string $normalized = null)
    {
        $uri = uri_parse($string);
        $this->assertSame($normalized ?? $string, (string)$uri);
        $this->assertSame($scheme, $uri->getScheme());
        $this->assertSame($authority, $uri->getAuthority());
        $this->assertSame($userInfo, $uri->getUserInfo());
        $this->assertSame($host, $uri->getHost());
        $this->assertSame($port, $uri->getPort());
        $this->assertSame($path, $uri->getPath());
        $this->assertSame($query, $uri->getQuery());
        $this->assertSame($fragment, $uri->getFragment());
    }

    public function dataRelative()
    {
        return [
            ["/", "/z", "/z"],
            ["/", "z", "/z"],
            ["", "z", "z"],
            ["", "/z", "/z"],

            ["/a", "/", "/"],
            ["/a", "", "/a"],
            ["a", "", "a"],
            ["a", "/", "/"],

            ["/a", "/z", "/z"],
            ["/a", "z", "/z"],
            ["a", "z", "z"],
            ["a", "/z", "/z"],

            ["/a/b", "/z", "/z"],
            ["/a/b", "z", "/a/z"],
            ["a/b", "z", "a/z"],
            ["a/b", "/z", "/z"],

            ["/a/b/", "/z", "/z"],
            ["/a/b/", "z", "/a/b/z"],
            ["a/b/", "z", "a/b/z"],
            ["a/b/", "/z", "/z"],

            ["/a", "/y/z", "/y/z"],
            ["/a", "y/z", "/y/z"],
            ["a", "y/z", "y/z"],
            ["a", "/y/z", "/y/z"],

            ["/a/b", "/y/z", "/y/z"],
            ["/a/b", "y/z", "/a/y/z"],
            ["a/b", "y/z", "a/y/z"],
            ["a/b", "/y/z", "/y/z"],

            ["/a/b/", "/y/z", "/y/z"],
            ["/a/b/", "y/z", "/a/b/y/z"],
            ["a/b/", "y/z", "a/b/y/z"],
            ["a/b/", "/y/z", "/y/z"],
        ];
    }

    /**
     * @dataProvider dataRelative
     * @param string $base
     * @param string $child
     * @param string $expect
     */
    public function testRelative(string $base, string $child, string $expect)
    {
        $this->assertSame($expect, path_relative($base, $child));
    }

    public function dataPathRelative()
    {
        return [
            ["http://a/b/c/d;p?q", "g:h", "g:h"],
            ["http://a/b/c/d;p?q", "g", "http://a/b/c/g"],
            ["http://a/b/c/d;p?q", "./g", "http://a/b/c/g"],
            ["http://a/b/c/d;p?q", "g/", "http://a/b/c/g/"],
            ["http://a/b/c/d;p?q", "/g", "http://a/g"],
            ["http://a/b/c/d;p?q", "//g", "http://g"],
            ["http://a/b/c/d;p?q", "?y", "http://a/b/c/d;p?y"],
            ["http://a/b/c/d;p?q", "g?y", "http://a/b/c/g?y"],
            ["http://a/b/c/d;p?q", "#s", "http://a/b/c/d;p?q#s"],
            ["http://a/b/c/d;p?q", "g#s", "http://a/b/c/g#s"],
            ["http://a/b/c/d;p?q", "g?y#s", "http://a/b/c/g?y#s"],
            ["http://a/b/c/d;p?q", ";x", "http://a/b/c/;x"],
            ["http://a/b/c/d;p?q", "g;x", "http://a/b/c/g;x"],
            ["http://a/b/c/d;p?q", "g;x?y#s", "http://a/b/c/g;x?y#s"],
            ["http://a/b/c/d;p?q", "", "http://a/b/c/d;p?q"],
            ["http://a/b/c/d;p?q", ".", "http://a/b/c/"],
            ["http://a/b/c/d;p?q", "./", "http://a/b/c/"],
            ["http://a/b/c/d;p?q", "..", "http://a/b/"],
            ["http://a/b/c/d;p?q", "../", "http://a/b/"],
            ["http://a/b/c/d;p?q", "../g", "http://a/b/g"],
            ["http://a/b/c/d;p?q", "../..", "http://a/"],
            ["http://a/b/c/d;p?q", "../../", "http://a/"],
            ["http://a/b/c/d;p?q", "../../g", "http://a/g"],

            ["http://a/b/c/d;p?q", "../../../g", "http://a/g"],
            ["http://a/b/c/d;p?q", "../../../../g", "http://a/g"],

            ["http://a/b/c/d;p?q", "/./g", "http://a/g"],
            ["http://a/b/c/d;p?q", "/../g", "http://a/g"],
            ["http://a/b/c/d;p?q", "g.", "http://a/b/c/g."],
            ["http://a/b/c/d;p?q", ".g", "http://a/b/c/.g"],
            ["http://a/b/c/d;p?q", "g..", "http://a/b/c/g.."],
            ["http://a/b/c/d;p?q", "..g", "http://a/b/c/..g"],

            ["http://a/b/c/d;p?q", "./../g", "http://a/b/g"],
            ["http://a/b/c/d;p?q", "./g/.", "http://a/b/c/g/"],
            ["http://a/b/c/d;p?q", "g/./h", "http://a/b/c/g/h"],
            ["http://a/b/c/d;p?q", "g/../h", "http://a/b/c/h"],
            ["http://a/b/c/d;p?q", "g;x=1/./y", "http://a/b/c/g;x=1/y"],
            ["http://a/b/c/d;p?q", "g;x=1/../y", "http://a/b/c/y"],

            ["http://a/b/c/d;p?q", "g?y/./x", "http://a/b/c/g?y/./x"],
            ["http://a/b/c/d;p?q", "g?y/../x", "http://a/b/c/g?y/../x"],
            ["http://a/b/c/d;p?q", "g#s/./x", "http://a/b/c/g#s/./x"],
            ["http://a/b/c/d;p?q", "g#s/../x", "http://a/b/c/g#s/../x"],

            ["http://user:pass@domain/a/b/c?x=X&y=Y#z", "", "http://user:pass@domain/a/b/c?x=X&y=Y#z",],
            ["https://user:pass@domain/a/b/c?x=X&y=Y#z", "", "https://user:pass@domain/a/b/c?x=X&y=Y#z",],
            ["https://user:pass@domain/a/b/c?x=X&y=Y#z", "//blah.com/x/y/z", "https://blah.com/x/y/z",],
            ["mailto:user@domain?subject=some subject", "", "mailto:user@domain?subject=some subject",],
            ["//user:pass@domain/a/b/c?x=X&y=Y#z", "", "//user:pass@domain/a/b/c?x=X&y=Y#z",],
            ["/a/b/c?x=X&y=Y#z", "", "/a/b/c?x=X&y=Y#z",],
            ["/a/b/c", "", "/a/b/c",],
            ["a/b/c", "", "a/b/c",],
            ["user@domain", "", "user@domain",],
            ["file:///a/b/c", "", "file:///a/b/c",],
            ["file:///a/b/c", "../../../../x", "file:///x",],
            ["file:///a/b/c/../a", "../../../../x", "file:///x",],
            ["file:///a/b/c/../a", "/x", "file:///x",],
            ["file:///a/b/c/../a", "x", "file:///a/b/x",],
            ["file:///a/b/c/../a/", "x", "file:///a/b/a/x",],
            ["file:///a/b/c/", "x/", "file:///a/b/c/x/",],
            ["about:config", "", "about:config",],
        ];
    }

    /**
     * @dataProvider dataPathRelative
     * @param string $parent
     * @param string $child
     * @param string $expect
     */
    public function testPathRelative(string $parent, string $child, string $expect)
    {
        $this->assertEquals($expect, (string)uri($parent)->merge($child));
    }
}
