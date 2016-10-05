<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $shared = new Product();
        $shared->setName('shared');
        $manager->persist($shared);

        $cloud = new Product();
        $cloud->setName('cloud');
        $manager->persist($cloud);

        $dedic = new Product();
        $dedic->setName('dedicated');
        $manager->persist($dedic);

        $resale = new Product();
        $resale->setName('reseller');
        $manager->persist($resale);

        $manager->flush();

        $this->setReference('product_shared', $shared);
        $this->setReference('product_cloud', $cloud);
        $this->setReference('product_dedicated', $dedic);
        $this->setReference('product_reseller', $resale);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

}