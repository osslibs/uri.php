<?php

namespace osslibs\URI;

/**
 * @see https://www.rfc-editor.org/rfc/rfc3986#appendix-B
 *
 * ^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?
 *  12            3  4          5       6  7        8 9
 */
const PATTERN_URI = '(([^:\/?#]+):)?(\/\/([^\/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?';

/**
 *
 */
const PATTERN_URI_SCHEME = '([A-Za-z]([A-Za-z0-9]|[\+ ]|\-|\.)*)';
const PATTERN_URI_AUTHORITY = '(?P<authority>(?P<userinfo_exists>(?P<userinfo>(([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:)*))@)?((?P<host>(\[((([0-9A-Fa-f]{1,4}\:){6}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|\:\:([0-9A-Fa-f]{1,4}\:){5}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|([0-9A-Fa-f]{1,4})?\:\:([0-9A-Fa-f]{1,4}\:){4}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,1}[0-9A-Fa-f]{1,4})?\:\:([0-9A-Fa-f]{1,4}\:){3}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,2}[0-9A-Fa-f]{1,4})?\:\:([0-9A-Fa-f]{1,4}\:){2}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,3}[0-9A-Fa-f]{1,4})?\:\:[0-9A-Fa-f]{1,4}\:(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,4}[0-9A-Fa-f]{1,4})?\:\:(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,5}[0-9A-Fa-f]{1,4})?\:\:[0-9A-Fa-f]{1,4}|(([0-9A-Fa-f]{1,4}\:){,6}[0-9A-Fa-f]{1,4})?\:\:)|([Vv][0-9A-Fa-f]+\.(([-A-Z._a-z0-9]|~)|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:)+))\])|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])|((([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=))*)))(?P<port_exists>\:(?P<port>[0-9]*))?';
const PATTERN_URI_USERINFO = '((([-A-Z.a-z0-9]|_|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:)*)';
const PATTERN_URI_HOST = '((\[((([0-9A-Fa-f]{1,4}\:){6}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|\:\:([0-9A-Fa-f]{1,4}\:){5}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|([0-9A-Fa-f]{1,4})?\:\:([0-9A-Fa-f]{1,4}\:){4}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,1}[0-9A-Fa-f]{1,4})?\:\:([0-9A-Fa-f]{1,4}\:){3}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,2}[0-9A-Fa-f]{1,4})?\:\:([0-9A-Fa-f]{1,4}\:){2}(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,3}[0-9A-Fa-f]{1,4})?\:\:[0-9A-Fa-f]{1,4}\:(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,4}[0-9A-Fa-f]{1,4})?\:\:(([0-9A-Fa-f]{1,4}\:[0-9A-Fa-f]{1,4})|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))|(([0-9A-Fa-f]{1,4}\:){,5}[0-9A-Fa-f]{1,4})?\:\:[0-9A-Fa-f]{1,4}|(([0-9A-Fa-f]{1,4}\:){,6}[0-9A-Fa-f]{1,4})?\:\:)|([Vv][0-9A-Fa-f]+\.(([-A-Z._a-z0-9]|~)|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:)+))\])|([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])|((([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=))*))';
const PATTERN_URI_PORT = '[0-9]*';
const PATTERN_URI_PATH = '((\/(([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)*)*|\/((([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)+(\/(([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)*)*)?|((([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|@)+)(\/(([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)*)*|(([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)+(\/(([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)*)*|MISSING-0(([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@))';
const PATTERN_URI_QUERY = '(((([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)|\/|\?)*)';
const PATTERN_URI_FRAGMENT = '(((([-A-Z._a-z0-9]|~)|%[0-9A-Fa-f][0-9A-Fa-f]|(\!|\$|&|\'|\(|\)|\*|[\+ ]|,|;|\=)|\:|@)|\/|\?)*)';

/**
 * Makes a URI.
 *
 * @param URI|string $uri
 * @param URIFactory|null $factory
 * @return URI
 * @throws InvalidURIException
 */
function uri($uri, URIFactory $factory = null): URI
{
    if ($uri instanceof URI) {
        return ($factory ?? new URIObjectFactory())->makeURI(
            $uri->getScheme(),
            $uri->getUserInfo(),
            $uri->getHost(),
            $uri->getPort(),
            $uri->getPath(),
            $uri->getQuery(),
            $uri->getFragment()
        );
    }

    return uri_parse((string)$uri);
}

/**
 * Makes a MutableURI.
 *
 * @param URI|string $uri
 * @param MutableURIFactory|null $factory
 * @return MutableURI
 * @throws InvalidURIException
 */
function mutable_uri($uri, MutableURIFactory $factory = null): MutableURI
{
    $uri = $uri instanceof URI ? $uri : uri_parse((string)$uri);

    return ($factory ?? new MutableURIObjectFactory())->makeMutableURI(
        $uri->getScheme(),
        $uri->getUserInfo(),
        $uri->getHost(),
        $uri->getPort(),
        $uri->getPath(),
        $uri->getQuery(),
        $uri->getFragment()
    );
}

/**
 * Parses a URI string.
 *
 * @param string $uri
 * @param URIFactory|null $factory
 * @return URI
 * @throws InvalidURIException
 */
function uri_parse(string $uri, URIFactory $factory = null): URI
{
    $uri_matches = [];

    if (!preg_match('/^' . PATTERN_URI . '$/', $uri, $uri_matches)) {
        throw new InvalidURIException("Invalid URI: $uri");
    }

    $uri_matches = array_pad($uri_matches, 10, null);

    list(
        $uri_matched,
        $scheme_exists,
        $scheme,
        $authority_exists,
        $authority,
        $path,
        $query_exists,
        $query,
        $fragment_exists,
        $fragment
        ) = $uri_matches;

    $authority_matches = [];

    $userinfo_value = null;
    $host_value = null;
    $port_value = null;

    if ($authority_exists && preg_match('/^' . PATTERN_URI_AUTHORITY . '$/', $authority, $authority_matches)) {
        $userinfo_value = array_key_exists("userinfo_exists", $authority_matches) && $authority_matches['userinfo_exists'] ? $authority_matches['userinfo'] : null;
        $host_value = array_key_exists("host", $authority_matches) ? $authority_matches['host'] : null;
        $port_value = array_key_exists("port_exists", $authority_matches) && $authority_matches['port_exists'] ? $authority_matches['port'] : null;
    }

    $scheme_value = $scheme_exists ? $scheme : null;
    $path_value = $path;
    $query_value = $query_exists ? $query : null;
    $fragment_value = $fragment_exists ? $fragment : null;

    $uri = ($factory ?? new URIObjectFactory())->makeURI(
        $scheme_value,
        $userinfo_value,
        $host_value,
        $port_value,
        $path_value,
        $query_value,
        $fragment_value
    );

    uri_verify($uri);

    return $uri;
}

/**
 * @param URI $uri
 * @return string|null
 */
function uri_authority(URI $uri): ?string
{
    return prefix(
        postfix($uri->getUserInfo(), '@'),
        postfix($uri->getHost(), prefix(':', $uri->getPort()))
    );
}

/**
 * @param URI $uri
 * @return string
 */
function uri_stringify(URI $uri): string
{
    return postfix($uri->getScheme(), ':')
        . prefix('//', uri_authority($uri))
        . remove_dot_segments($uri->getPath())
        . prefix('?', $uri->getQuery())
        . prefix('#', $uri->getFragment());
}

/**
 * @param URI $parent
 * @param URI $child
 * @param URIFactory|null $factory
 * @return URI
 */
function uri_merge(URI $parent, URI $child, URIFactory $factory = null): URI
{
    $factory = $factory ?? new URIObjectFactory();

    if ($child->getScheme() !== null) {
        return $factory->makeURI(
            $child->getScheme(),
            $child->getUserInfo(),
            $child->getHost(),
            $child->getPort(),
            $child->getPath(),
            $child->getQuery(),
            $child->getFragment()
        );
    }

    if ($child->getAuthority() !== null) {
        return $factory->makeURI(
            $parent->getScheme(),
            $child->getUserInfo(),
            $child->getHost(),
            $child->getPort(),
            $child->getPath(),
            $child->getQuery(),
            $child->getFragment()
        );
    }

    if ($child->getPath()) {
        return $factory->makeURI(
            $parent->getScheme(),
            $parent->getUserInfo(),
            $parent->getHost(),
            $parent->getPort(),
            path_relative($parent->getPath(), $child->getPath()),
            $child->getQuery(),
            $child->getFragment()
        );
    }

    if ($child->getQuery() !== null) {
        return $factory->makeURI(
            $parent->getScheme(),
            $parent->getUserInfo(),
            $parent->getHost(),
            $parent->getPort(),
            path_relative($parent->getPath(), $child->getPath()),
            $child->getQuery(),
            $child->getFragment()
        );
    }

    if ($child->getFragment() !== null) {
        return $factory->makeURI(
            $parent->getScheme(),
            $parent->getUserInfo(),
            $parent->getHost(),
            $parent->getPort(),
            path_relative($parent->getPath(), $child->getPath()),
            $parent->getQuery(),
            $child->getFragment()
        );
    }

    return $factory->makeURI(
        $parent->getScheme(),
        $parent->getUserInfo(),
        $parent->getHost(),
        $parent->getPort(),
        path_relative($parent->getPath(), $child->getPath()),
        $parent->getQuery(),
        $parent->getFragment()
    );
}

/**
 * @param string $scheme
 * @return string
 * @throws InvalidURIException
 */
function uri_normalize_scheme(string $scheme): string
{
    uri_verify_scheme($scheme);
    return strtolower($scheme);
}

/**
 * @param URI $uri
 * @param URIFactory|null $URIFactory
 * @return URI
 * @throws InvalidURIException
 */
function uri_normalize(URI $uri, URIFactory $URIFactory = null): URI
{
    return $factory->makeURI(
        uri_normalize_scheme($uri->getScheme()),
        $uri->getUserInfo(),
        $uri->getHost(),
        $uri->getPort(),
        $uri->getPath(),
        $uri->getQuery(),
        $uri->getFragment()
    );
}

/**
 * @param string|null $value
 * @throws InvalidURIException
 */
function uri_verify_scheme(?string $value)
{
    if ($value !== null && !preg_match('/^' . PATTERN_URI_SCHEME . '$/', $value)) {
        throw new InvalidURIException("invalid scheme: {$value}");
    }
}

/**
 * @param string|null $value
 * @throws InvalidURIException
 */
function uri_verify_userinfo(?string $value)
{
    if ($value !== null && !preg_match('/^' . PATTERN_URI_USERINFO . '$/', $value)) {
        throw new InvalidURIException("invalid userinfo: {$value}");
    }
}

/**
 * @param string|null $value
 * @throws InvalidURIException
 */
function uri_verify_host(?string $value)
{
    if ($value !== null && !preg_match('/^' . PATTERN_URI_HOST . '$/', $value)) {
        throw new InvalidURIException("invalid host: {$value}");
    }
}

/**
 * @param string|null $value
 * @throws InvalidURIException
 */
function uri_verify_port(?string $value)
{
    if ($value !== null && !preg_match('/^' . PATTERN_URI_PORT . '$/', $value)) {
        throw new InvalidURIException("invalid port: {$value}");
    }
}

/**
 * @param string|null $value
 * @throws InvalidURIException
 */
function uri_verify_path(?string $value)
{
    if ($value !== null && !preg_match('/^' . PATTERN_URI_PATH . '$/', $value)) {
        throw new InvalidURIException("invalid path: {$value}");
    }
}

/**
 * @param string|null $value
 * @throws InvalidURIException
 */
function uri_verify_query(?string $value)
{
    if ($value !== null && !preg_match('/^' . PATTERN_URI_QUERY . '$/', $value)) {
        throw new InvalidURIException("invalid query: {$value}");
    }
}

/**
 * @param string|null $value
 * @throws InvalidURIException
 */
function uri_verify_fragment(?string $value)
{
    if ($value !== null && !preg_match('/^' . PATTERN_URI_FRAGMENT . '$/', $value)) {
        throw new InvalidURIException("invalid fragment: {$value}");
    }
}

/**
 * @param URI $uri
 * @throws InvalidURIException
 */
function uri_verify(URI $uri)
{
    uri_verify_scheme($uri->getScheme());
    uri_verify_userinfo($uri->getUserInfo());
    uri_verify_host($uri->getHost());
    uri_verify_port($uri->getPort());
    uri_verify_path($uri->getPath());
    uri_verify_query($uri->getQuery());
    uri_verify_fragment($uri->getFragment());
}

/**
 * Prefixes a non-null string.
 *
 * @param string|null $prefix
 * @param string|null $subject
 * @return string|null
 */
function prefix(?string $prefix, ?string $subject): ?string
{
    return $subject !== null ? $prefix . $subject : $subject;
}

/**
 * Postfixes a non-null string.
 *
 * @param string|null $subject
 * @param string|null $postfix
 * @return string|null
 */
function postfix(?string $subject, ?string $postfix): ?string
{
    return $subject !== null ? $subject . $postfix : $subject;
}

/**
 * @param string $input
 * @return string
 */
function remove_dot_segments(string $input): string
{
    $output = '';
    while (strpos($input, './') !== false || strpos($input, '/.') !== false || $input === '.' || $input === '..') {
        // A: If the input buffer begins with a prefix of "../" or "./",
        // then remove that prefix from the input buffer; otherwise,
        if (strpos($input, '../') === 0) {
            $input = substr($input, 3);
        } elseif (strpos($input, './') === 0) {
            $input = substr($input, 2);
        }
        // B: if the input buffer begins with a prefix of "/./" or "/.",
        // where "." is a complete path segment, then replace that prefix
        // with "/" in the input buffer; otherwise,
        elseif (strpos($input, '/./') === 0) {
            $input = substr($input, 2);
        } elseif ($input === '/.') {
            $input = '/';
        }
        // C: if the input buffer begins with a prefix of "/../" or "/..",
        // where ".." is a complete path segment, then replace that prefix
        // with "/" in the input buffer and remove the last segment and its
        // preceding "/" (if any) from the output buffer; otherwise,
        elseif (strpos($input, '/../') === 0) {
            $input = substr($input, 3);
            $output = substr_replace($output, '', strrpos($output, '/'));
        } elseif ($input === '/..') {
            $input = '/';
            $output = substr_replace($output, '', strrpos($output, '/'));
        }
        // D: if the input buffer consists only of "." or "..", then remove
        // that from the input buffer; otherwise,
        elseif ($input === '.' || $input === '..') {
            $input = '';
        }
        // E: move the first path segment in the input buffer to the end of
        // the output buffer, including the initial "/" character (if any)
        // and any subsequent characters up to, but not including, the next
        // "/" character or the end of the input buffer
        elseif (($pos = strpos($input, '/', 1)) !== false) {
            $output .= substr($input, 0, $pos);
            $input = substr_replace($input, '', 0, $pos);
        } else {
            $output .= $input;
            $input = '';
        }
    }
    return $output . $input;
}

/**
 * Resolves a path given a base and child paths.
 *
 * @param string|null $base
 * @param string|null $child
 * @return string
 */
function path_relative(?string $base, ?string $child): string
{
    $base = (string)$base;
    $child = (string)$child;

    if (!$child) {
        return $base;
    }

    if (!$base || $child[0] === "/") {
        return $child;
    }

    $bases = explode('/', $base);

    array_pop($bases);
    array_push($bases, $child);

    return implode('/', $bases);
}
