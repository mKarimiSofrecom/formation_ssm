<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Academic;
use App\Entity\Skill;
use App\Entity\Experience;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CvFixtures extends Fixture
{
    private $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {

        

        // Simulate Academic

        $academic = new Academic();
        $academic->setDegree('Bachelor\'s in Computer Science');
        $academic->setInstitution('University Casablanca');
        $academic->setYear(new \DateTime('2014-01-01'));
        $academic->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $manager->persist($academic);

        $academic2 = new Academic();
        $academic2->setDegree('Master\'s in Project Management');
        $academic2->setInstitution('School Rabat');
        $academic2->setYear(new \DateTime('2012-01-01'));
        $academic2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $manager->persist($academic2);

        $academic3 = new Academic();
        $academic3->setDegree('Software Engineer');
        $academic3->setInstitution('School Engineering ');
        $academic3->setYear(new \DateTime('2010-01-01'));
        $academic3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $manager->persist($academic3);


        // Simulate skills
        $skill = new Skill();
        $skill->setName('HTML / HTML5');
        $skill->setLevel(40);
        $manager->persist($skill);

        $skill2 = new Skill();
        $skill2->setName('CSS / CSS3');
        $skill2->setLevel(70);
        $manager->persist($skill2);

        $skill3 = new Skill();
        $skill3->setName('JavaScript');
        $skill3->setLevel(50);
        $manager->persist($skill3);

        $skill4 = new Skill();
        $skill4->setName('PHP');
        $skill4->setLevel(80);
        $manager->persist($skill4);

        $skill5 = new Skill();
        $skill5->setName('Gestion de Projet');
        $skill5->setLevel(20);
        $manager->persist($skill5);

        $skill6 = new Skill();
        $skill6->setName('Symfony');
        $skill6->setLevel(20);
        $manager->persist($skill6);

        $skill7 = new Skill();
        $skill7->setName('React');
        $skill7->setLevel(20);
        $manager->persist($skill7);

        $skill8 = new Skill();
        $skill8->setName('Angular');
        $skill8->setLevel(20);
        $manager->persist($skill8);

        $skill9 = new Skill();
        $skill9->setName('NodeJs');
        $skill9->setLevel(20);
        $manager->persist($skill9);

        $skill10 = new Skill();
        $skill10->setName('MongoDB');
        $skill10->setLevel(20);
        $manager->persist($skill10);


        // Simulate user data 
        $user = new User();
        $user->setFullname('John Doe Mickel');
        $user->setJop('UI Develope');
        $user->setPhone('123-456-7890');
        $user->setAdress('123 rue Principale, Montréal, QC, Canada');
        $user->setBirthday(new \DateTime('1990-01-01'));
        $user->setPiographie('Lorem ipsum dolor sit amet consectetur adipisicing elit.');
        $user->setEmail('john.doe@example.com');
        $hashedPassword = $this->hasher->hashPassword($user, "passwd");
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_USER']);
        $user->setPicture("https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=600");
        $user->addAcademic( $academic3);
        $user->addAcademic( $academic2);
        $user->addAcademic( $academic);
        $user->addSkill($skill);
        $user->addSkill($skill4);
        $user->addSkill($skill5);
        $user->addSkill($skill8);
        $user->addSkill($skill9);
        $manager->persist($user);

        $user1 = new User();
        $user1->setFullname('John Doe Mickel');
        $user1->setJop('UI Develope');
        $user1->setPhone('123-456-7890');
        $user1->setAdress('123 rue Principale, Montréal, QC, Canada');
        $user1->setBirthday(new \DateTime('1990-01-01'));
        $user1->setPiographie('Lorem ipsum dolor sit amet consectetur adipisicing elit.');
        $user1->setEmail('joh@gmail.com');
        $hashedPassword = $this->hasher->hashPassword($user1, "passwd");
        $user1->setPassword($hashedPassword);
        $user1->setRoles(['ROLE_USER']);

        $user1->setPicture("https://images.pexels.com/photos/1043471/pexels-photo-1043471.jpeg?auto=compress&cs=tinysrgb&w=600");
        $user1->addAcademic( $academic2);
        $user1->addAcademic( $academic3);
        $user1->addSkill($skill);
        $user1->addSkill($skill7);
        $user1->addSkill($skill8);
        $user1->addSkill($skill9);
        $user1->addSkill($skill10);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setFullname('mohamed ali chahboun ');
        $user2->setJop('manager data engineer ');
        $user2->setPhone('123-456-7890');
        $user2->setAdress('123 rue Principale, Montréal, californie, usa');
        $user2->setBirthday(new \DateTime('1997-01-01'));
        $user2->setPiographie('Lorem ipsum dolor sit amet consectetur adipisicing elit.');
        $user2->setEmail('mohammedali@fmail.com');
        $hashedPassword = $this->hasher->hashPassword($user2, "passwd");
        $user2->setPassword($hashedPassword);
        $user2->setRoles(['ROLE_ADMIN']);
        $user2->setPicture("https://images.pexels.com/photos/697509/pexels-photo-697509.jpeg?auto=compress&cs=tinysrgb&w=600");
        $user2->addAcademic($academic);
        $user2->addAcademic($academic2);
        $user2->addSkill($skill8);
        $user2->addSkill($skill9);
        $user2->addSkill($skill10);
        
        $manager->persist($user2);

        // Simulate Experience
        $experience = new Experience();
        $experience->setPosition('UI Developes');
        $experience->setCompany('ABC Inc');
        $experience->setPeriod('2015-2018');
        $experience->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $experience->setUser($user);
        $manager->persist($experience);

        $experience2 = new Experience();
        $experience2->setPosition('Full Stack Developes');
        $experience2->setCompany('Capgemini  france');
        $experience2->setPeriod('2018-2022');
        $experience2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $experience2->setUser($user);
        $manager->persist($experience2);

        $experience3 = new Experience();
        $experience3->setPosition('Manager');
        $experience3->setCompany('atos');
        $experience3->setPeriod('2018-2022');
        $experience3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $experience3->setUser($user);
        $manager->persist($experience3);

        $experience4 = new Experience();
        $experience4->setPosition('testeur qualité');
        $experience4->setCompany('sofrecom');
        $experience4->setPeriod('2018-2022');
        $experience4->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $experience4->setUser($user2);
        $manager->persist($experience4);

        $experience5 = new Experience();
        $experience5->setPosition('big data engineer');
        $experience5->setCompany('france telecom');
        $experience5->setPeriod('2018-2022');
        $experience5->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $experience5->setUser($user2);
        $manager->persist($experience5);

        $experience6 = new Experience();
        $experience6->setPosition('cloud engineer');
        $experience6->setCompany('google');
        $experience6->setPeriod('2018-2022');
        $experience6->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $experience6->setUser($user1);
        $manager->persist($experience6);

        $experience7 = new Experience();
        $experience7->setPosition('python developes');
        $experience7->setCompany('facebook');
        $experience7->setPeriod('2018-2022');
        $experience7->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna.');
        $experience7->setUser($user1);
        $manager->persist($experience7);






        $manager->flush();
    }
}
       
