<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use App\Service\MarkdownHelper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class QuestionController extends AbstractController{

    private $logger;
    private $isDebug;

    //If I need the services in all the methods
    public function __construct(LoggerInterface $logger, bool $isDebug)
    {
        $this->logger = $logger;
        $this->isDebug = $isDebug;
    }

    /**
     * Undocumented function
     *
     * @Route("/", name="app_homepage")
     */
    public function homepage(){
        return $this->render('question/homepage.html.twig');
    }

    /**
     * Autowiring services needed in this method
     *
     * @Route("/questions/{slug}", name="app_questions_show")
     */
    public function show($slug, MarkdownHelper $markdownHelper){

        $answers = [
            'Make sure your cat is sitting `purrrfectly` still',
            'Honestly, I like furry shoes better than MY cats',
            'Maybe...try saying the spell backwards??',
        ];

        $questionText = 'I\'ve been turned into a cat, any thoughts on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';
        $parsedQuestionText = $markdownHelper->parse($questionText);
        

       

       $deslug = ucwords(str_replace('-',' ', $slug));
        return $this->render('question/show.html.twig', [
            'title' => $deslug,
            'answers' => $answers,
            'questionText' => $parsedQuestionText,
            'slug' => $slug
        ]);
    }

}

