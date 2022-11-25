<?php

namespace App\EventSubscriber;

use App\Entity\Produit;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $security;

    public function __construct(Security $secutiry)
    {
        $this->secutiry = $secutiry;
    }

    public  static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setUser'],
        ];
    }

    

    public function setUser (BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Produit)) {
            return;
        }

        $user = $this->security->getUser();
        $entity->setUser($user);


    }

}