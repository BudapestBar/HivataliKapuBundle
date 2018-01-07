<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="HivataliKapuBundle_Nyomtatvany")
 */
class Nyomtatvany
{

    const STATUS_QUEUED     = 0;
    const STATUS_STORED     = 1;
    const STATUS_DECRYPTED  = 2;
    const STATUS_EXPORTED   = 4;

	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum", inversedBy="Nyomtatvany")
     */
    protected $Dokumentum;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $encrypted;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $decrypted;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $attachments;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $status;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $isConfirmed;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $fileNev;
    
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

   
    /**
     * Gets the value of Dokumentum.
     *
     * @return mixed
     */
    public function getDokumentum()
    {
        return $this->Dokumentum;
    }

    /**
     * Sets the value of Dokumentum.
     *
     * @param mixed $Dokumentum the dokumentum
     *
     * @return self
     */
    public function setDokumentum($Dokumentum)
    {
        $this->Dokumentum = $Dokumentum;

        return $this;
    }

    /**
     * Gets the value of encrypted.
     *
     * @return mixed
     */
    public function getEncrypted()
    {
        return $this->encrypted;
    }

    /**
     * Sets the value of encrypted.
     *
     * @param mixed $encrypted the encrypted
     *
     * @return self
     */
    public function setEncrypted($encrypted)
    {
        $this->encrypted = $encrypted;

        return $this;
    }

    /**
     * Gets the value of decrypted.
     *
     * @return mixed
     */
    public function getDecrypted()
    {
        return $this->decrypted;
    }

    /**
     * Sets the value of decrypted.
     *
     * @param mixed $decrypted the decrypted
     *
     * @return self
     */
    public function setDecrypted($decrypted)
    {
        $this->decrypted = $decrypted;

        return $this;
    }

    /**
     * Gets the value of attachments.
     *
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Sets the value of attachments.
     *
     * @param mixed $attachments the attachments
     *
     * @return self
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of isConfirmed.
     *
     * @return mixed
     */
    public function getIsConfirmed()
    {
        return $this->isConfirmed;
    }

    /**
     * Sets the value of isConfirmed.
     *
     * @param mixed $isConfirmed the is confirmed
     *
     * @return self
     */
    public function setIsConfirmed($isConfirmed)
    {
        $this->isConfirmed = $isConfirmed;

        return $this;
    }

    /**
     * Gets the value of fileNev.
     *
     * @return mixed
     */
    public function getFileNev()
    {
        return $this->fileNev;
    }

    /**
     * Sets the value of fileNev.
     *
     * @param mixed $fileNev the file nev
     *
     * @return self
     */
    public function setFileNev($fileNev)
    {
        $this->fileNev = $fileNev;

        return $this;
    }
}