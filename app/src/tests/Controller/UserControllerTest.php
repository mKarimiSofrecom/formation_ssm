<?php

namespace App\Test\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private UserRepository $repository;
    private string $path = '/user/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(User::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'user[email]' => 'Testing',
            'user[roles]' => 'Testing',
            'user[password]' => 'Testing',
            'user[fullname]' => 'Testing',
            'user[jop]' => 'Testing',
            'user[phone]' => 'Testing',
            'user[adress]' => 'Testing',
            'user[birthday]' => 'Testing',
            'user[piographie]' => 'Testing',
            'user[picture]' => 'Testing',
            'user[user_to]' => 'Testing',
            'user[review]' => 'Testing',
            'user[skills]' => 'Testing',
            'user[academics]' => 'Testing',
        ]);

        self::assertResponseRedirects('/user/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new User();
        $fixture->setEmail('My Title');
        $fixture->setRoles('My Title');
        $fixture->setPassword('My Title');
        $fixture->setFullname('My Title');
        $fixture->setJop('My Title');
        $fixture->setPhone('My Title');
        $fixture->setAdress('My Title');
        $fixture->setBirthday('My Title');
        $fixture->setPiographie('My Title');
        $fixture->setPicture('My Title');
        $fixture->setUser_to('My Title');
        $fixture->setReview('My Title');
        $fixture->setSkills('My Title');
        $fixture->setAcademics('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new User();
        $fixture->setEmail('My Title');
        $fixture->setRoles('My Title');
        $fixture->setPassword('My Title');
        $fixture->setFullname('My Title');
        $fixture->setJop('My Title');
        $fixture->setPhone('My Title');
        $fixture->setAdress('My Title');
        $fixture->setBirthday('My Title');
        $fixture->setPiographie('My Title');
        $fixture->setPicture('My Title');
        $fixture->setUser_to('My Title');
        $fixture->setReview('My Title');
        $fixture->setSkills('My Title');
        $fixture->setAcademics('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'user[email]' => 'Something New',
            'user[roles]' => 'Something New',
            'user[password]' => 'Something New',
            'user[fullname]' => 'Something New',
            'user[jop]' => 'Something New',
            'user[phone]' => 'Something New',
            'user[adress]' => 'Something New',
            'user[birthday]' => 'Something New',
            'user[piographie]' => 'Something New',
            'user[picture]' => 'Something New',
            'user[user_to]' => 'Something New',
            'user[review]' => 'Something New',
            'user[skills]' => 'Something New',
            'user[academics]' => 'Something New',
        ]);

        self::assertResponseRedirects('/user/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getRoles());
        self::assertSame('Something New', $fixture[0]->getPassword());
        self::assertSame('Something New', $fixture[0]->getFullname());
        self::assertSame('Something New', $fixture[0]->getJop());
        self::assertSame('Something New', $fixture[0]->getPhone());
        self::assertSame('Something New', $fixture[0]->getAdress());
        self::assertSame('Something New', $fixture[0]->getBirthday());
        self::assertSame('Something New', $fixture[0]->getPiographie());
        self::assertSame('Something New', $fixture[0]->getPicture());
        self::assertSame('Something New', $fixture[0]->getUser_to());
        self::assertSame('Something New', $fixture[0]->getReview());
        self::assertSame('Something New', $fixture[0]->getSkills());
        self::assertSame('Something New', $fixture[0]->getAcademics());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new User();
        $fixture->setEmail('My Title');
        $fixture->setRoles('My Title');
        $fixture->setPassword('My Title');
        $fixture->setFullname('My Title');
        $fixture->setJop('My Title');
        $fixture->setPhone('My Title');
        $fixture->setAdress('My Title');
        $fixture->setBirthday('My Title');
        $fixture->setPiographie('My Title');
        $fixture->setPicture('My Title');
        $fixture->setUser_to('My Title');
        $fixture->setReview('My Title');
        $fixture->setSkills('My Title');
        $fixture->setAcademics('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/user/');
    }
}
