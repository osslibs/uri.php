<?php

namespace osslibs\URI;

use Exception;

class URIObject implements URI
{
    use URITrait;

    public function merge($child): URI
    {
        return uri_merge($this, uri($child));
    }
}
