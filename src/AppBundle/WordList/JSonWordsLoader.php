<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 16:09
 */

namespace AppBundle\WordList;


use AppBundle\WordList\NotValidFormatException;

class JSonWordsLoader implements WordsLoaderInterface
{

    private $words = [];

    public function loadFile($fileToLoad)
    {
        $newWords = json_decode(file_get_contents($fileToLoad));
        if ($newWords === null)
            throw new NotValidFormatException();
        $this->words = array_merge($this->words, $newWords);
    }

    public function getWords()
    {
        return $this->words;
    }
}