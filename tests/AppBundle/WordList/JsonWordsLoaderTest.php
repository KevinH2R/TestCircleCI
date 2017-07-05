<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 16:04
 */

namespace Tests\AppBundle\WordList;


use AppBundle\WordList\NotValidFormatException;
use PHPUnit\Framework\TestCase;

class JsonWordsLoaderTest extends TestCase
{
    public function testThatItCanReadJsonFiles()
    {
        $fileToLoad = __DIR__.'\5_words_dummy.json';
        $loader = new JSonWordsLoader();
        $loader->loadFile($fileToLoad);

        $this->assertCount(5, $loader->getWords());
    }

//    public function testThatLoaderFailsOnNonJsonFiles()
//    {
//        $fileToLoad = __DIR__.'\5_words_dummy.txt';
//        $loader = new JSonWordsLoader();
//        $loader->loadFile($fileToLoad);
//    }
}