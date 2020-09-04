<?php
namespace App\Service;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;

class MarkdownHelper {

    private $markdown;
    private $cache;    
    private $isDebug;
    private $logger;

    //isDebug can't be autowired because it is not a service => add it as an argument in service.yaml under MarkdownHelper
    public function __construct(MarkdownParserInterface $markdown, CacheInterface $cache, bool $isDebug, LoggerInterface $mdLogger)
    {
        $this->markdown = $markdown;
        $this->cache = $cache;
        $this->debug = $isDebug;
        $this->logger = $mdLogger;
        //dump($isDebug);
    }

    public function parse(string $source): string {

        if(stripos($source, 'cat') !== false){
            $this->logger->info('Meow!');
        }

        if($this->isDebug){ //If kernel.debug is true==env:dev I don't want markdown to be cached
            return $this->markdown->transformMarkdown($source);
        }

        return $this->cache->get('markdown_'.md5($source), function() use ($source) {
            return $this->markdown->transformMarkdown($source);
        });
            
       
    }
}