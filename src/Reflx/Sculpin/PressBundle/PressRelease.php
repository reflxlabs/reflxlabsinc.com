<?php

namespace Reflx\Sculpin\PressBundle;

use Sculpin\Contrib\ProxySourceCollection\ProxySourceItem;

class PressRelease extends ProxySourceItem
{
    public function date()
    {
        return $this->data()->get('calculated_date');
    }

    public function title()
    {
        return $this->data()->get('title');
    }
}
