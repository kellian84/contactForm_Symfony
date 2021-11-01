<?php

namespace App\Entity;

use App\Repository\MailModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MailModelRepository::class)
 */
class MailModel
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
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=CustomerModel::class, mappedBy="mail")
     */
    private $customerModels;

    public $messageModels;

    public function __construct()
    {
        $this->customerModels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|CustomerModel[]
     */
    public function getCustomerModels(): Collection
    {
        return $this->customerModels;
    }

    public function addCustomerModel(CustomerModel $customerModel): self
    {
        if (!$this->customerModels->contains($customerModel)) {
            $this->customerModels[] = $customerModel;
            $customerModel->setMail($this);
        }

        return $this;
    }

    public function removeCustomerModel(CustomerModel $customerModel): self
    {
        if ($this->customerModels->removeElement($customerModel)) {
            // set the owning side to null (unless already changed)
            if ($customerModel->getMail() === $this) {
                $customerModel->setMail(null);
            }
        }

        return $this;
    }

    public function __toString()
        {
    	    $vars = array('email');
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

                foreach($vars as $var)
                {
                    $separator = ' | ';
                    $var_arr = explode('@', $var);
                    $var = $var_arr[0];
                    if(count($var_arr) > 1)
                        $separator = $var_arr[1];
                    $var_func = 'get'.ucfirst($var);
                    if(!empty($entity->$var_func()))
                    {
                        $field = $entity->$var_func();


                        if(is_object($field))
                        {
                            if ($field instanceof \DateTime) {
                                $field = $field->format('Y-m-d\TH:i:s.u');
                            }
                            else{
                               $field = $field->__toString();
                            }
                        }

                        $output .= ($i > 0 ? $separator : '').$field;
                        $output .= ( array_key_exists($separator, $closeable) ? $closeable[$separator] : '');
                        $i++;
                    }

                }
                return $output;
            }
}
