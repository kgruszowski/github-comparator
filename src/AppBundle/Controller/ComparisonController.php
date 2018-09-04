<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ComparisonController
 * @package AppBundle\Controller
 * @Route("/comparison")
 */
class ComparisonController extends Controller
{
    /**
     * @Route("", name="comparison", methods={"POST"})
     */
    public function indexAction(Request $request)
    {
        return new JsonResponse([
            'status' => 'ok'
        ]);
    }
}
