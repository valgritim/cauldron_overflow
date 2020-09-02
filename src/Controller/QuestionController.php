<?php
namespace App\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

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
    public function show($slug, MarkdownParserInterface $markdown, CacheInterface $cache){

        $answers = [
            'Make sure your cat is sitting `purrrfectly` still',
            'Honestly, I like furry shoes better than MY cats',
            'Maybe...try saying the spell backwards??',
        ];

        $questionText = 'I\'ve been turned into a cat, any thoughts on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';

        $parsedQuestionText= $cache->get('markdown_'.md5($questionText), function() use($questionText, $markdown){
            return $markdown->transformMarkdown($questionText);
        });

        dd($markdown);
       

       $deslug = ucwords(str_replace('-',' ', $slug));
        return $this->render('question/show.html.twig', [
            'title' => $deslug,
            'answers' => $answers,
            'questionText' => $parsedQuestionText,
            'slug' => $slug
        ]);
    }

}

