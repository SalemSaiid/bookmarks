<?php

namespace test\App\Config;

use App\Service\CardService;

class CardServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \App\Service\CardService $cardService
     */
    protected $cardService;


    public function setUp() :void
    {
        $this->cardService = new CardService();
    }

    public function testOrderByRank()
    {
        $card = [
            [
                'suit' => 'Club',
                'value' => 3,
            ],
            [
                'suit' => 'Diamond',
                'value' => 2,
            ],
            [
                'suit' => 'Spades',
                'value' => 'K',
            ],
            [
                'suit' => 'Diamond',
                'value' => 'Q',
            ],
            [
                'suit' => 'Club',
                'value' => 7,
            ],
            [
                'suit' => 'Spades',
                'value' => 'A',
            ],
            [
                'suit' => 'Spades',
                'value' => 4,
            ],
        ];

        $cardAfterOrderByRank = [
            [
                'suit' => 'Diamond',
                'value' => 2,
            ],
            [
                'suit' => 'Club',
                'value' => 3,
            ],
            [
                'suit' => 'Spades',
                'value' => 4,
            ],
            [
                'suit' => 'Club',
                'value' => 7,
            ],
            [
                'suit' => 'Diamond',
                'value' => 'Q',
            ],
            [
                'suit' => 'Spades',
                'value' => 'K',
            ],
            [
                'suit' => 'Spades',
                'value' => 'A',
            ],
        ];

        $result = $this->cardService->orderByRank($card);
        $this->assertEquals($result, $cardAfterOrderByRank);
    }

    public function testOrderBySuit()
    {
        $card = [
            [
                'suit' => 'Club',
                'value' => 3,
            ],
            [
                'suit' => 'Diamond',
                'value' => 2,
            ],
            [
                'suit' => 'Spades',
                'value' => 'K',
            ],
            [
                'suit' => 'Diamond',
                'value' => 'Q',
            ],
            [
                'suit' => 'Club',
                'value' => 7,
            ],
            [
                'suit' => 'Spades',
                'value' => 'A',
            ],
            [
                'suit' => 'Spades',
                'value' => 4,
            ],
        ];

        $cardAfterOrderByRank = [
            [
                'suit' => 'Club',
                'value' => 3,
            ],
            [
                'suit' => 'Club',
                'value' => 7,
            ],
            [
                'suit' => 'Diamond',
                'value' => 2,
            ],
            [
                'suit' => 'Diamond',
                'value' => 'Q',
            ],
            [
                'suit' => 'Spades',
                'value' => 4,
            ],
            [
                'suit' => 'Spades',
                'value' => 'K',
            ],
            [
                'suit' => 'Spades',
                'value' => 'A',
            ],
        ];

        $result = $this->cardService->orderBySuit($card);
        $this->assertEquals($result, $cardAfterOrderByRank);
    }
}
