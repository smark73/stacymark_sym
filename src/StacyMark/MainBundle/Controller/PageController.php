<?php

namespace StacyMark\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{ 
              
       public function indexAction($slug){

           $em = $this->getDoctrine()
                   ->getManager();
           
           // selected painting
           $painting = $em->getRepository('StacyMarkMainBundle:Painting')
                   ->findOneBy(array('slug' => $slug));
           
           //thumbs
           $paintings = $em->createQueryBuilder()
                   ->select(array('p'))
                   ->from('StacyMarkMainBundle:Painting', 'p')
                   ->addOrderBy('p.date_fin', 'DESC')
                   ->getQuery()
                   ->getResult();
           
                   
           if(!$paintings){
               throw $this->createNotFoundException('Unable to find painting data');
           }
           
           return $this->render('StacyMarkMainBundle:Page:index.html.twig', array(
               'paintings' => $paintings,
               'painting' => $painting
           ));
       }
}


?>
