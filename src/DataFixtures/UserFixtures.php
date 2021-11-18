<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface $encoder */
    private $encoder;

    public function __construct(UserPasswordHasherInterface  $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            ['username' => 'user', 'email' => 'user@user.fr', 'password' => 'user', 'role' => 'ROLE_USER'],
            ['username' => 'admin', 'email' => 'admin@admin.fr', 'password' => 'admin', 'role' => 'ROLE_ADMIN'],
        ];

        foreach ($users as $u) {
            $user = new User();
            $user->setEmail($u['email']);
            $user->setName($u['username']);
            $user->setRoles($u,'roles');

            $password = $this->encoder->hashPassword($user, $u['password']);
            $user->setPassword($password);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
