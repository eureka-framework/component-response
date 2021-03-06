<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Component\Response\Html;

use Eureka\Component\Response\Response;
use Eureka\Component\Response\Header\Header;

/**
 * Class to manage response for in html format
 *
 * @author  Romain Cottard
 */
class Html extends Response
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->addHeader(new Header('Content-type: text/html'));
    }

    /**
     * Render content.
     *
     * @return string
     * @throws \LogicException
     */
    public function renderContent()
    {
        if (is_object($this->content) && !method_exists($this->content, '__toString')) {
            throw new \LogicException('Cannot render content: it is an object without __toString method!');
        }

        if (is_array($this->content)) {
            throw new \LogicException('Cannot render content: it is an array!');
        }

        return (string) $this->content;
    }
}