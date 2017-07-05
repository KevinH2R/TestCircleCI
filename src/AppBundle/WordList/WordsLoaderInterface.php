<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 17:08
 */

namespace AppBundle\WordList;

interface WordsLoaderInterface
{
    public function loadFile($fileToLoad);
    public function getWords();
}