<?php
namespace Mtg\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class GlossaryController extends AbstractRestfulController
{
    /**
     * @var \Mtg\Model\Repository\GlossaryEntryRepository
     */
    protected $glossaryRepository;

    public function __construct(\Mtg\Model\Repository\GlossaryEntryRepository $glossaryRepository)
    {
        $this->glossaryRepository = $glossaryRepository;
    }

    public function get($id)
    {
        /* @var $glossaryEntry \Mtg\Model\GlossaryEntry */
        $glossaryEntry = $this->glossaryRepository->find($id);
        if (!$glossaryEntry) {
            return new JsonModel(array(
                'error' => sprintf('Can\'t find glossary entry "%s"', $id),
            ));
        }

        return new JsonModel(array(
            'id' => $glossaryEntry->getId(),
            'glossarytext' => $glossaryEntry->getGlossarytext(),
        ));
    }

    public function searchAction()
    {
        $token = $this->params('token');
        if (!$token) {
            return new JsonModel(array(
                'error' => 'Search token can\'t be empty',
            ));
        } elseif (strlen($token) < 4) {
            return new JsonModel(array(
                'error' => 'Search token must be at least 4 characters long',
            ));
        }

        $result = array();
        $glossaryEntries = $this->glossaryRepository->findByFulltextSearch($token);
        /* @var $glossaryEntry \Mtg\Model\GlossaryEntry */
        foreach ($glossaryEntries as $glossaryEntry) {
            $result[] = array(
                'id' => $glossaryEntry->getId(),
                'glossarytext' => $glossaryEntry->getGlossarytext(),
            );
        }
        return new JsonModel($result);
    }

}
