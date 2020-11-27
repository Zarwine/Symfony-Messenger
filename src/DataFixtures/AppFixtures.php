<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($u = 0; $u < 10; ++$u) {
            $user = new User();
            $passHash = $this->encoder->encodePassword($user, '123456');

            $user->setUsername($faker->userName)
                ->setPassword($passHash);

            $manager->persist($user);
            }

        $manager->flush();
    }
}