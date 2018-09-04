<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProjectController
 * @package AppBundle\Controller
 * @Route("/project")
 */
class ProjectController extends Controller
{
    /**
     * @Route("/{username}/{project}", name="project.info", methods={"GET"})
     */
    public function indexAction(Request $request, string $username, string $project)
    {
        return new JsonResponse([
            'username' => $username,
            'project' => $project
        ]);
    }
}
