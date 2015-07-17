<?php
namespace TgBotApi\Model\Annotation;

interface InterfaceDiscriminationMapperInterface
{
    public function getClass($data);
    public function getParam();
}
