<?php

namespace App\Entity;

use App\Repository\MessageModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\CustomerModel;

/**
 * @ORM\Entity(repositoryClass=MessageModelRepository::class)
 */
class MessageModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=CustomerModel::class, inversedBy="messageModels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function __toString()
    {
	    $vars = array('id', 'message');
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

    public function getCustomer(): ?CustomerModel
    {
        return $this->customer;
    }

    public function setCustomer(?CustomerModel $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

}
