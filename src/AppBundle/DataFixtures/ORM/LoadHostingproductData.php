<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Hostingproduct;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadHostingproductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $products = [
            'product_shared',
            'product_cloud',
            'product_dedicated',
            'product_reseller'
        ];

        $plans = [
            'hosting_plan_personal' => '5.00',
            'hosting_plan_professional' => '10.00',
            'hosting_plan_business' => '15.00',
            'hosting_plan_enterprise' => '20.00',
        ];
        $data = [];

        foreach ($products as $product) {
            foreach ($plans as $plan => $planPrice) {
                $key = sprintf('%s:%s', $product, $plan);

                $data[$key] = new Hostingproduct();
                $data[$key]->setHostaction($this->getReference('hosting_action_register'));
                $data[$key]->setHostingplan($this->getReference($plan));
                $data[$key]->setProduct($this->getReference($product));
                $data[$key]->setPrice($planPrice);

                $manager->persist($data[$key]);
            }
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}