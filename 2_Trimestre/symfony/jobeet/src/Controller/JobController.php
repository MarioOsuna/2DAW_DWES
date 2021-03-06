<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JobRepository;
use App\Repository\CategoryRepository;


class JobController extends AbstractController
{
  /**
   * @Route("/{id}",name="job.show")
   * 
   * @param Job $jobs
   * 
   * @return Response
   * 
   */
  public function show(Job $job): Response
  {

    return $this->render('job/show.html.twig', [
      'job' => $job,
    ]);
  }
  /**
   * @Route("/", name="job.list")
   * @return Response
   * 
   * 
   */

  public function list(EntityManagerInterface $em): Response
  {
    $categories = $em->getRepository(Category::class)->findWithActiveJobs();

    return $this->render('job/list.html.twig', [
        'categories' => $categories,
    ]);
    
  }
}
