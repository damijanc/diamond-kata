<?php
declare(strict_types=1);

namespace Kata;


class Diamond
{

    public function build($inputChar)
    {

        $diamond = $this->buildTopOfDiamond($inputChar);
        return $this->mirror($diamond);
    }

    /**
     * @param $inputChar
     * @return array
     */
    protected function buildTopOfDiamond($inputChar): array
    {
        $diamond = [];
        $numberOfLines = $this->getNumberOfLines($inputChar);

        for ($i = 0; $i < $numberOfLines / 2; $i++) {

            $currentLetter = chr(ord('A') + $i);

            $diamondLine = $this->buildLinesOfDiamond($inputChar, $numberOfLines, $currentLetter, $i);
            $diamond [] = $diamondLine;

        }
        return $diamond;
    }

    /**
     * @param string $letterOfAlphabet
     * @return int
     */
    protected function getAlphabetOffset(string $letterOfAlphabet)
    {
        return ord($letterOfAlphabet) - ord('A') + 1;
    }


    /**
     * @param string $letterOfAlphabet
     * @return int
     */
    protected function getNumberOfLines(string $letterOfAlphabet): int
    {
        return (2 * $this->getAlphabetOffset($letterOfAlphabet)) - 1;
    }

    /**
     * @param array $diamond
     * @return array
     */
    protected function mirror(array $diamond): array
    {
        $originalSize = count($diamond);
        $reverseDiamond = array_reverse($diamond);
        for ($i = 1; $i < $originalSize; $i++) {
            $diamond[] = $reverseDiamond[$i];
        }

        return $diamond;
    }

    /**
     * @param $letterOfAlphabet
     * @param $numberOfLines
     * @param $currentLetter
     * @param $offset
     * @return string
     */
    protected function buildLinesOfDiamond($letterOfAlphabet, $numberOfLines, $currentLetter, $offset): string
    {
        $template = str_repeat('_', $numberOfLines);
        $template = substr_replace(
            $template,
            $currentLetter,
            $this->getAlphabetOffset($letterOfAlphabet) - $offset - 1,
            1
        );

        $template = substr_replace(
            $template,
            $currentLetter,
            $this->getAlphabetOffset($letterOfAlphabet) + $offset - 1,
            1
        );
        return $template;
    }


}