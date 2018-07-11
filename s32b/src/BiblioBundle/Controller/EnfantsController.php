<?php
namespace BiblioBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BiblioBundle\Entity\enfants;



class EnfantsController extends Controller
{
    public function ajoutAction(Request $request){    
	    
	    $enfants=new Enfants();
	    
	    $form=$this->createForm('BiblioBundle\Form\enfantsType',$enfants);
	    $form->handleRequest($request);
	    
	    if($form->isSubmitted() && $form->isValid()){
	        $em=$this->getDoctrine()->getManager();
	        $em->persist($enfants);
	        $em->flush($enfants);
	     }

		    return $this->render('BiblioBundle:Default:ajoutPlat.html.twig',array(
		        'enfants'=>$enfants,
		        'form'=>$form->CreateView(),
    		)) ;   

	}
}

?>