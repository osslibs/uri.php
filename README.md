# osslibs/uri

## Priorities

1. Define a URI interface with methods returning URI components as outlined in [RFC 3986-#section-3](https://www.ietf.org/rfc/rfc3986.html#section-3)
2. URI parsing according to [RFC 3986-#section-3](https://www.ietf.org/rfc/rfc3986.html#section-3)
3. URI merging according to [RFC 3986#section-5.2.3](https://www.ietf.org/rfc/rfc3986.html#section-5.2.3)

## Requirements

* php

## Install
    php composer.phar require osslibs/uri

## Examples
    > use function osslibs\URI\uri as uri;
    > use function osslibs\URI\mutable_uri as mutable_uri;
    >
    > $uri = uri("scheme://user@host:port/path?query#fragment")
    > echo $uri->getScheme();
    "scheme"
    > echo $uri->getUserInfo();
    "user"
    > echo $uri->getHost();
    "host"
    > echo $uri->getPort();
    "port"
    > echo $uri->getAuthority();
    "user@host:port"
    > echo $uri->getPath();
    "path"
    > echo $uri->getQuery();
    "query"
    > echo $uri->getFragment();
    "fragment"
    > echo (string)$uri;
    "scheme://user@host:port/path?query#fragment"
