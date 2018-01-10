<?php
// src/Controller/LuckyController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends Controller
{
	/**
	 * @Route("/lucky/number",name="数字")
	 */
	public function number()
	{
		$number = mt_rand(0, 100);

//		return new Response(
//			'<html><body>Lucky number: ' . $number . '</body></html>'
//		);
		return $this->render('lucky/number.html.twig', ['number' => $number]);
	}


}