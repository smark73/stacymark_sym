<?php

namespace StacyMark\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
        /**
        * @Route("/", name="_stacymark_gallery")
        * @Template()
        */
      public function defaultAction(){
           return $this->render('StacyMarkMainBundle:Page:index.html.twig', array(
               'g' => '1'
           ));
       }    
    
        /**
        * @Route("/gallery/{g}/paintings", name="_stacymark_gallery")
        * @Template()
        */
      public function indexAction($g){
           return $this->render('StacyMarkMainBundle:Page:index.html.twig', array(
               'g' => $g
           ));
       }
       
       // with gallery
       public function showAction($g, $id){
           $em = $this->getDoctrine()
                   ->getManager();
           
           $painting = $em->getRepository('StacyMarkMainBundle:Painting')
                   ->find($id);
           
           $paintings = $em->createQueryBuilder()
                   ->select(array('p'))
                   ->from('StacyMarkMainBundle:Painting', 'p')
                   ->addOrderBy('p.title', 'ASC')
                   ->getQuery()
                   ->getResult();
                   
           if(!$paintings){
               throw $this->createNotFoundException('Unable to find painting data');
           }
           
           return $this->render('StacyMarkMainBundle:Page:painting.html.twig', array(
               'g' => $g,
               'paintings' => $paintings,
               'painting' => $painting
           ));
       }
       
       //without gallery
        public function showptgAction($id){
           $em = $this->getDoctrine()
                   ->getManager();
           
           $painting = $em->getRepository('StacyMarkMainBundle:Painting')
                   ->find($id);
           
           $paintings = $em->createQueryBuilder()
                   ->select(array('p'))
                   ->from('StacyMarkMainBundle:Painting', 'p')
                   ->addOrderBy('p.title', 'ASC')
                   ->getQuery()
                   ->getResult();
                   
           if(!$paintings){
               throw $this->createNotFoundException('Unable to find painting data');
           }
           
           return $this->render('StacyMarkMainBundle:Page:painting.html.twig', array(
               'paintings' => $paintings,
               'painting' => $painting
           ));
       }
               
}


?>
