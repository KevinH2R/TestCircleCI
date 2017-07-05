<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 15:51
 */

namespace AppBundle\WordList;


class WordList
{

    private $words = [];
    private $loaders = [];

    public function getWords()
    {
        $words = [];
        foreach ($this->loaders as $loader) {
            $tmp = $loader->getWords();
            $words = array_merge($words, $tmp);
        }
        $result = array_merge($this->words, $words);
        return $result;
    }

    public function loadWords($loadedWords)
    {
        $this->words = array_merge($this->words, $loadedWords);
    }

    public function addLoader(WordsLoaderInterface $loader, $filetype)
    {
        $this->loaders[$filetype] = $loader;
    }

    public function addWordsByFile($file)
    {
        $fileExtension = substr($file, -3);
        $this->loaders[$fileExtension]->loadFile($file);
    }
}