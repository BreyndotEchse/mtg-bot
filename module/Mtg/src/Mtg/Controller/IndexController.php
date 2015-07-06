<?php
namespace Mtg\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractRestfulController
{
    public function getList()
    {
        return new JsonModel(array(
            'data' => 'test',
        ));
    }

}
