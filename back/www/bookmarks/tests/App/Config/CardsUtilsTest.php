<?php

namespace test\App\Config;

use App\Config\CardsUtils;

class CardsUtilsTest extends \PHPUnit\Framework\TestCase
{
    public function testGetDiamondCardsTest()
    {
        $result = CardsUtils::getDiamondCards();
        $this->assertEquals(['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'], $result);
    }

    public function testGetSpadesCardsTest()
    {
        $result = CardsUtils::getSpadesCards();
        $this->assertEquals(['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'], $result);
    }

    public function testGetHeartCardsTest()
    {
        $result = CardsUtils::getHeartCards();
        $this->assertEquals(['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'], $result);
    }

    public function testGetRandomSpadesCards()
    {
        $result = CardsUtils::getSpadesCards();
        $this->assertEquals(['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'], $result);
    }

    public function testGetRandomDiamondCardsTest()
    {
        $result1 = CardsUtils::getRandomSpadesCards(2);
        $result2 = CardsUtils::getRandomSpadesCards(5);
        $result3 = CardsUtils::getRandomSpadesCards(6);
        $this->assertCount(2, $result1);
        $this->assertCount(5, $result2);
        $this->assertCount(6, $result3);
    }

    public function testGetRandomHeartCardsTest()
    {
        $result1 = CardsUtils::getRandomHeartCards(2);
        $result2 = CardsUtils::getRandomHeartCards(5);
        $result3 = CardsUtils::getRandomHeartCards(6);
        $this->assertCount(2, $result1);
        $this->assertCount(5, $result2);
        $this->assertCount(6, $result3);
    }

    public function testGetRandomClubCardsTest()
    {
        $result1 = CardsUtils::getRandomClubCards(2);
        $result2 = CardsUtils::getRandomClubCards(5);
        $result3 = CardsUtils::getRandomClubCards(6);
        $this->assertCount(2, $result1);
        $this->assertCount(5, $result2);
        $this->assertCount(6, $result3);
    }

    public function testRandomSpadesCardsTest()
    {
        $result1 = CardsUtils::getRandomSpadesCards(2);
        $result2 = CardsUtils::getRandomSpadesCards(5);
        $result3 = CardsUtils::getRandomSpadesCards(6);
        $this->assertCount(2, $result1);
        $this->assertCount(5, $result2);
        $this->assertCount(6, $result3);
    }
}
