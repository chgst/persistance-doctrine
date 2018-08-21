<?php

namespace spec\Changeset\Event;

use Changeset\Event\EventInterface;
use Changeset\Event\ObjectRepository;
use Doctrine\Common\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;

class ObjectRepositorySpec extends ObjectBehavior
{
    function let(ObjectManager $manager)
    {
        $this->beConstructedWith($manager);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ObjectRepository::class);
    }

    function it_can_append_event_to_data_store(ObjectManager $manager, EventInterface $event)
    {
        $manager->persist($event)->shouldBeCalled();
        $manager->flush($event)->shouldBeCalled();

        $this->append($event);
    }
}
