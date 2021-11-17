<?php

namespace App\DataFixtures;

use Faker;
use DateTime;
use App\Entity\Task;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $user = new User();
        // $user->setUsername('admin');
        $user->setEmail('admin@todolist.fr');
        $user->setPassword($this->encoder->hashPassword($user, 'admin'));
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        for ($i = 1; $i <= 10; $i++) {

            $user = new User();
            // $user->setUsername('user' . $i);
            $user->setEmail('user' . $i . '@todolist.fr');
            $user->setPassword($this->encoder->hashPassword($user, 'user' . $i));
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);

            $task = new Task();
            $task->setTitle('Tache n°' . $i);
            $task->setContent('Informations sur la tache');
            $task->setCreateAt(new \DateTime());
            // $task->setAuthor($i);

            // if ($i <= 7) {
            //     $task->setAuthor($user);
            // }

            $manager->persist($task);
        }

        $manager->flush();
    }
}
