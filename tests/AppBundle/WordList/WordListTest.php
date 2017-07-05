<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 15:47
 */

namespace Tests\AppBundle\WordList;

use AppBundle\WordList\TxtWordsLoader;
use AppBundle\WordList\WordList;
use PHPUnit\Framework\TestCase;

class WordListTest extends TestCase
{
    public function testThatWordListLoadedWords()
    {
        $loadedWords = ['coucou', 'ola', 'salut', 'guttentag', 'bonjour'];
        $fileToLoad= '5_words_dummy.txt';
        $loader = $this->createMock(TxtWordsLoader::class);
        $loader->expects($this->once())
            ->method('loadFile')
            ->with($fileToLoad);

        $loader->expects($this->once())
            ->method('getWords')
            ->willReturn($loadedWords);

        $wordList = new WordList();
        $wordList->addLoader($loader, 'txt');
        $wordList->addWordsByFile($fileToLoad);
        $this->assertEquals($loadedWords, $wordList->getWords());
    }
}