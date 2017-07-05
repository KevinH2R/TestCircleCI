<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 16:59
 */

namespace AppBundle\WordList;


use AppBundle\WordList\NotValidFormatException;

class TxtWordsLoader implements WordsLoaderInterface
{

    private $words = [];

    public function loadFile($fileToLoad)
    {
        $newWords = file($fileToLoad, FILE_IGNORE_NEW_LINES);
        if ($newWords === null)
            throw new NotValidFormatException();
        $this->words = array_merge($this->words, $newWords);
    }

    public function getWords()
    {
        return $this->words;
    }
}