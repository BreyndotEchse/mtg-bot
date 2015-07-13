<?php
namespace Mtg\Controller;

use RuntimeException;
use Zend\Console\Request as ConsoleRequest;
use Zend\Mvc\Controller\AbstractActionController;

class ImportController extends AbstractActionController
{
    public function importAction()
    {
        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new RuntimeException('You can only use this action from a console!');
        }

        $importer = new \Mtg\RulesImporter\RulesImporter;
        $importer->import($this->params('filePath'));
    }
}
