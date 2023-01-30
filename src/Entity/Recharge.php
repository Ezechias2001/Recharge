<?php

namespace App\Entity;

use App\Repository\RechargeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechargeRepository::class)]
class Recharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $messenger_messages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessengerMessages(): ?string
    {
        return $this->messenger_messages;
    }

    public function setMessengerMessages(?string $messenger_messages): self
    {
        $this->messenger_messages = $messenger_messages;

        return $this;
    }
}
