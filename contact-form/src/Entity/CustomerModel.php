<?php

namespace App\Entity;

use App\Entity\MessageModel;

use App\Repository\CustomerModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerModelRepository::class)
 */
class CustomerModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    public $message;
    public $email;

    /**
     * @ORM\OneToMany(targetEntity=MessageModel::class, mappedBy="customer")
     */
    private $messageModels;

    /**
     * @ORM\ManyToOne(targetEntity=MailModel::class, inversedBy="customerModels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer")
     */
    private $isRead;

    public function __construct()
    {
        $this->messageModels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection|MessageModel[]
     */
    public function getMessageModels(): Collection
    {
        return $this->messageModels;
    }

    public function addMessageModel(MessageModel $messageModel): self
    {
        if (!$this->messageModels->contains($messageModel)) {
            $this->messageModels[] = $messageModel;
            $messageModel->setCustomer($this);
        }

        return $this;
    }

    public function removeMessageModel(MessageModel $messageModel): self
    {
        if ($this->messageModels->removeElement($messageModel)) {
            // set the owning side to null (unless already changed)
            if ($messageModel->getCustomer() === $this) {
                $messageModel->setCustomer(null);
            }
        }

        return $this;
    }

    public function getMail(): ?MailModel
    {
        return $this->mail;
    }

    public function setMail(?MailModel $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function __toString()
    {
        $vars = array('firstname', 'lastname');
        $output = $this->EntityToString($this, $vars);

        return $output;
    }

    public static function EntityToString($entity, $vars)
    {
        // $vars = array('id','reference','name', 'unit@ (');
        $output = '';
        $i = 0;

        $closeable = array(
            ' (' => ') ',
            ' [' => '] ',
        );

        foreach ($vars as $var) {
            $separator = ' | ';
            $var_arr = explode('@', $var);
            $var = $var_arr[0];
            if (count($var_arr) > 1) {
                $separator = $var_arr[1];
            }
            $var_func = 'get' . ucfirst($var);
            if (!empty($entity->$var_func())) {
                $field = $entity->$var_func();


                if (is_object($field)) {
                    if ($field instanceof \DateTime) {
                        $field = $field->format('Y-m-d\TH:i:s.u');
                    } else {
                        $field = $field->__toString();
                    }
                }

                $output .= ($i > 0 ? $separator : '') . $field;
                $output .= (array_key_exists($separator, $closeable) ? $closeable[$separator] : '');
                $i++;
            }

        }
        return $output;
    }

    public function getIsRead(): ?int
    {
        return $this->isRead;
    }

    public function setIsRead(int $isRead): self
    {
        $this->isRead = $isRead;

        return $this;
    }


}
