<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Hostingplan;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadHostingplanData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $personalPlan = new Hostingplan();
        $personalPlan->setPlan('PERSONAL');
        $personalPlan->setAlias('personal');
        $personalPlan->setDisksize('200');
        $personalPlan->setBandwidth('3000');
        $personalPlan->setDescription('Personal');

        $manager->persist($personalPlan);

        $professionalPlan = new Hostingplan();
        $professionalPlan->setPlan('PROFESSIONAL');
        $professionalPlan->setAlias('professional');
        $professionalPlan->setDisksize('500');
        $professionalPlan->setBandwidth('5000');
        $professionalPlan->setDescription('PROFESSIONAL');

        $manager->persist($professionalPlan);

        $businessPlan = new Hostingplan();
        $businessPlan->setPlan('BUSINESS');
        $businessPlan->setAlias('business');
        $businessPlan->setDisksize('1000');
        $businessPlan->setBandwidth('10000');
        $businessPlan->setDescription('BUSINESS');

        $manager->persist($businessPlan);

        $enterprisePlan = new Hostingplan();
        $enterprisePlan->setPlan('ENTERPRISE');
        $enterprisePlan->setAlias('enterprise');
        $enterprisePlan->setDisksize('2000');
        $enterprisePlan->setBandwidth('100000');
        $enterprisePlan->setDescription('ENTERPRISE');

        $manager->persist($enterprisePlan);

        $manager->flush();

        $this->setReference('hosting_plan_personal', $personalPlan);
        $this->setReference('hosting_plan_professional', $professionalPlan);
        $this->setReference('hosting_plan_business', $businessPlan);
        $this->setReference('hosting_plan_enterprise', $enterprisePlan);

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