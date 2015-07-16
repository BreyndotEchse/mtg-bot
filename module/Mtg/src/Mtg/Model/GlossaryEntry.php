<?php
namespace Mtg\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Mtg\Model\Repository\GlossaryEntryRepository")
 * @ORM\Table(name="glossaryentry", indexes={
 *      @ORM\Index(name="glossarytext", columns={"glossarytext"}, flags={"fulltext"})
 * })
 */
class GlossaryEntry
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=50, options={"fixed"=true})
     * @var string
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $glossarytext = '';

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return GlossaryEntry
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGlossarytext()
    {
        return $this->glossarytext;
    }

    /**
     * @param string $glossarytext
     * @return GlossaryEntry
     */
    public function setGlossarytext($glossarytext)
    {
        $this->glossarytext = $glossarytext;
        return $this;
    }

    /**
     * @param string $glossarytextLine
     * @return GlossaryEntry
     */
    public function addGlossarytextLine($glossarytextLine)
    {
        $glossarytexArray = explode("\n", $this->glossarytext);
        $glossarytexArray[] = $glossarytextLine;
        $this->glossarytext = implode("\n", $glossarytexArray);
        return $this;
    }

}
