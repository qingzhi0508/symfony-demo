<?php

namespace App\Controller;

use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
	/**
	 * @Route("/product", name="product")
	 */
	public function index()
	{
		// replace this line with your own code!
//        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
		$em = $this->getDoctrine()->getManager();
		$product = new Product();
		$product->setName('mouse');
		$product->setPrice(11);
		$em->persist($product);
		$em->flush();
		return new Response('Saved product id' . $product->getId());


	}

	/**
	 * @Route("/product/{id}",name="product_show")
	 */
	public function showAction($id)
	{
		$product = $this->getDoctrine()->getRepository(Product::class)->find($id);
		if (!$product) {
			throw $this->createNotFoundException(
				'Not Found For id ' . $id
			);
		}
		return new Response('check out this product ' . $product->getName());
	}


	/**
	 * @Route("/test",name="product_test")
	 */
	public function testAction(){

		return new Response('test ');
//		echo "yell";

	}




}
