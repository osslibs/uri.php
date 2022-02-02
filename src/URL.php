<?php

namespace URL;

class URL
{
    public static function Factory($url)
    {
    }

    public static function parse(string $url): URL
    {
    }

    /**
     * Prefixes a non-null string.
     *
     * @param string|null $prefix
     * @param string|null $string
     * @return string|null
     */
    private static function prefix(?string $prefix, ?string $string): ?string
    {
        return $string !== null ? $prefix . $string : $string;
    }

    /**
     * Postfixes a non-null string.
     *
     * @param string|null $string
     * @param string|null $postfix
     * @return string|null
     */
    private static function postfix(?string $string, ?string $postfix): ?string
    {
        return $string !== null ? $string . $postfix : $string;
    }

    /**
     * Resolves a path given a base and child paths.
     *
     * @param string|null $base
     * @param string|null $child
     * @return string
     */
    private static function path_relative(?string $base, ?string $child): string
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

    private static function remove_dot_segments(string $input): string
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
     * @var string
     */
    private $scheme;

    /**
     * @var string
     */
    private $authority;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $fragment;

    public function __construct(?string $scheme, ?string $authority, string $path, ?string $query, ?string $fragment)
    {
        $this->scheme = $scheme;
        $this->authority = $authority;
        $this->path = $path;
        $this->query = $query;
        $this->fragment = $fragment;
    }

    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    public function getAuthority(): ?string
    {
        return $this->authority;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function getFragment(): ?string
    {
        return $this->fragment;
    }

    public function setScheme(?string $scheme)
    {
        $this->scheme = $scheme;
    }

    public function setAuthority(?string $authority)
    {
        $this->authority = $authority;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function setQuery(?string $query)
    {
        $this->query = $query;
    }

    public function setFragment(?string $fragment)
    {
        $this->fragment = $fragment;
    }

    public function __toString()
    {
        return self::postfix($uri->getScheme(), ':')
            . self::prefix('//', $uri->getAuthority())
            . self::remove_dot_segments($uri->getPath())
            . self::prefix('?', $uri->getQuery())
            . self::prefix('#', $uri->getFragment());
    }

    public function merge($child): URI
    {
        $child = self::Factory($child);

        if ($child->getScheme() !== null) {
            return new URL(
                $child->getScheme(),
                $child->getAuthority(),
                $child->getPath(),
                $child->getQuery(),
                $child->getFragment()
            );
        }

        if ($child->getAuthority() !== null) {
            return new URL(
                $parent->getScheme(),
                $child->getAuthority(),
                $child->getPath(),
                $child->getQuery(),
                $child->getFragment()
            );
        }

        if ($child->getPath()) {
            return new URL(
                $parent->getScheme(),
                $parent->getAuthority(),
                self::path_relative($parent->getPath(), $child->getPath()),
                $child->getQuery(),
                $child->getFragment()
            );
        }

        if ($child->getQuery() !== null) {
            return new URL(
                $parent->getScheme(),
                $parent->getAuthority(),
                self::path_relative($parent->getPath(), $child->getPath()),
                $child->getQuery(),
                $child->getFragment()
            );
        }

        if ($child->getFragment() !== null) {
            return new URL(
                $parent->getScheme(),
                $parent->getAuthority(),
                self::path_relative($parent->getPath(), $child->getPath()),
                $parent->getQuery(),
                $child->getFragment()
            );
        }

        return new URL(
            $parent->getScheme(),
            $parent->getAuthority(),
            self::path_relative($parent->getPath(), $child->getPath()),
            $parent->getQuery(),
            $parent->getFragment()
        );
    }
}