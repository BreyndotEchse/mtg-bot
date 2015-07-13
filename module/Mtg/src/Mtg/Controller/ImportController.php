<?php
namespace Mtg\Controller;

use Mtg\RulesImporter\RulesImporter;
use RuntimeException;
use Zend\Console\Request as ConsoleRequest;
use Zend\Mvc\Controller\AbstractActionController;

class ImportController extends AbstractActionController
{
    /**
     * @var RulesImporter
     */
    protected $rulesImporter;

    /**
     * @param RulesImporter $rulesImporter
     */
    public function __construct(RulesImporter $rulesImporter)
    {
        $this->rulesImporter = $rulesImporter;
    }


    public function importAction()
    {
        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new RuntimeException('You can only use this action from a console!');
        }

        $importer = new RulesImporter;
        $importer->import($this->params('filePath'));
    }
}
