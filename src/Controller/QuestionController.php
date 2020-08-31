<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class QuestionController{

    /**
     * Undocumented function
     *
     * @Route("/")
     */
    public function homepage(){

        return new Response("What a bewitching controller we have conjured!");
    }

    /**
     * Undocumented function
     *
     * @Route("/questions/{slug}")
     */
    public function show($slug){
        return new Response(sprintf("Future page to te question: %s", $slug));
    }

}

