<?php
declare(strict_types=1);

namespace Kata\Tests;

use Kata\Diamond;
use PHPUnit\Framework\TestCase;

class DiamondTest extends TestCase
{

    protected $results = [
        ['A'],
        [
            '_A_',
            'B_B',
            '_A_'
        ],
        [
            '__A__',
            '_B_B_',
            'C___C',
            '_B_B_',
            '__A__',
        ],
        [
            '___A___',
            '__B_B__',
            '_C___C_',
            'D_____D',
            '_C___C_',
            '__B_B__',
            '___A___',
        ],

    ];


    public function testAlgorithm()
    {
        $diamond = new Diamond();
        $result = $diamond->build('A');

        $this->assertSame($this->results[0], $result);
    }

    public function testAlgorithmB()
    {
        $diamond = new Diamond();
        $result = $diamond->build('B');

        $this->assertSame($this->results[1], $result);
    }

    public function testAlgorithmC()
    {
        $diamond = new Diamond();
        $result = $diamond->build('C');

        $this->assertSame($this->results[2], $result);
    }

    public function testAlgorithmD()
    {
        $diamond = new Diamond();
        $result = $diamond->build('D');

        $this->assertSame($this->results[3], $result);
    }
}