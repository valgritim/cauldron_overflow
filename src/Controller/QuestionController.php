<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class QuestionController extends AbstractController{

    /**
     * Undocumented function
     *
     * @Route("/", name="app_homepage")
     */
    public function homepage(){
        return $this->render('question/homepage.html.twig');
    }

    /**
     * Undocumented function
     *
     * @Route("/questions/{slug}", name="app_questions_show")
     */
    public function show($slug){

        $answers = [
            'Make sure your cat is sitting purrrfectly still',
            'Honestly, I like furry shoes better than MY cats',
            'Maybe...try saying the spell backwards??',
        ];

       $deslug = ucwords(str_replace('-',' ', $slug));
        return $this->render('question/show.html.twig', [
            'title' => $deslug,
            'answers' => $answers,
            'slug' => $slug
        ]);
    }

}

