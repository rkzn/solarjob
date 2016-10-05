<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class HostingController extends Controller
{
    /**
     * @Route("/", name="hostingpage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::hosting.html.twig', [
            'products' => $this->getDoctrine()->getRepository('AppBundle:Product')->findAll(),
        ]);


    }

    /**
     * @Route("/", name="planpage")
     */
    public function planAction(Request $request)
    {
        $plans = $this->getDoctrine()->getRepository('AppBundle:Hostingplan')->listHostingRegisterPrices($request->get('plan'));

        return $this->render('AppBundle:Hosting:hosting_plans.html.twig', [
            'hostingplans' => $plans
        ]);
    }
}
