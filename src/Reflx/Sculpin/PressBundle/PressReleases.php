<?php

namespace Reflx\Sculpin\PressBundle;

use Sculpin\Contrib\ProxySourceCollection\ProxySourceCollection;

class PressReleases extends ProxySourceCollection
{
    public function init()
    {
        // We have special sorting rules for our items based on the date
        // and title. This assumes that the items are actually PressRelease
        // instances.
        uasort($this->items, function ($a, $b) {
            return strnatcmp($b->date().' '.$b->title(), $a->date().' '.$a->title());
        });

        parent::init();
    }
}
