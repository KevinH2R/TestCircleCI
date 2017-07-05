<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 16:57
 */

namespace Tests\AppBundle\WordList;



use PHPUnit\Framework\TestCase;

class TxtWordsLoaderTest extends TestCase
{
    public function testThatItCanReadTxtFiles()
    {
        $fileToLoad = __DIR__.'\5_words_dummy.txt';
        $loader = new TxtWordsLoader();
        $loader->loadFile($fileToLoad);

        $this->assertCount(5, $loader->getWords());

    }
}