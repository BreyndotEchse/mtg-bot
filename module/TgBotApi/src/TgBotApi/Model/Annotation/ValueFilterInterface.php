<?php
namespace TgBotApi\Model\Annotation;

use Zend\Filter\FilterInterface;

interface ValueFilterInterface extends FilterInterface
{
    public function getParam();
}
