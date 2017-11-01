<?php

namespace AlbumTest\Model\Entity;

use Album\Model\Entity\AlbumEntity;
use DomainException;
use PHPUnit\Framework\TestCase;

class AlbumEntityTest extends TestCase
{
    public function testInitialAlbumValuesAreNull()
    {
        $entity = new AlbumEntity();

        $this->assertNull($entity->getId(), '"id" should be null by default');
        $this->assertNull($entity->getArtist(), '"artist" should be null by default');
        $this->assertNull($entity->getTitle(), '"title" should be null by default');
    }

    public function testSetGetId()
    {
        $entity = new AlbumEntity();
        $entity->setId(1);
        $this->assertEquals(1, $entity->getId());
        $this->assertEquals(
            [
                'id'     => 1,
                'artist' => null,
                'title'  => null,
            ],
            $entity->getArrayCopy()
        );
    }

    public function testSetGetArtist()
    {
        $entity = new AlbumEntity();
        $entity->setArtist('testArtist');
        $this->assertEquals('testArtist', $entity->getArtist());
        $this->assertEquals(
            [
                'id'     => null,
                'artist' => 'testArtist',
                'title'  => null,
            ],
            $entity->getArrayCopy()
        );
    }

    public function testSetGetTitle()
    {
        $entity = new AlbumEntity();
        $entity->setTitle('testTitle');
        $this->assertEquals('testTitle', $entity->getTitle());
        $this->assertEquals(
            [
                'id'     => null,
                'artist' => null,
                'title'  => 'testTitle',
            ],
            $entity->getArrayCopy()
        );
    }

    public function testSetIdThrowsExceptionWhenIntIsZero()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Album id must be a positive integer!');

        $entity = new AlbumEntity();
        $entity->setId(0);
    }

    public function testSetIdThrowsExceptionWhenIntIsNegative()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Album id must be a positive integer!');

        $entity = new AlbumEntity();
        $entity->setId(-1);
    }

    public function testSetArtistThrowsExceptionWhenStrlenOutOfBounds()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Album artist must be between 1 and 100 chars!');

        $testString = 'testArtist with much too much characters 0123456789012345678901234567890123456789'
                    . '01234567890123456789012345678901234567890123456789012345678901234567890123456789';
        $entity = new AlbumEntity();
        $entity->setArtist($testString);
    }

    public function testSetTitleThrowsExceptionWhenStrlenOutOfBounds()
    {
        $this->expectException(DomainException::class);

        $testString = 'testTitle with much too much characters 0123456789012345678901234567890123456789'
                    . '01234567890123456789012345678901234567890123456789012345678901234567890123456789';
        $entity = new AlbumEntity();
        $entity->setTitle($testString);
    }

    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $entity = new AlbumEntity();

        $data = [
            'id'     => 123,
            'artist' => 'testArtist',
            'title'  => 'testTitle',
        ];
        $entity->exchangeArray($data);

        $this->assertSame($data['id'], $entity->getId(), '"id" was not set correctly');
        $this->assertSame($data['artist'], $entity->getArtist(), '"artist" was not set correctly');
        $this->assertSame($data['title'], $entity->getTitle(), '"title" was not set correctly');
    }

    public function testGetArrayCopyReturnsAnArrayWithPropertyValues()
    {
        $entity = new AlbumEntity();

        $data = [
            'id'     => 123,
            'artist' => 'testArtist',
            'title'  => 'testTitle',
        ];

        $entity->exchangeArray($data);
        $copyEntity = $entity->getArrayCopy();

        $this->assertSame($data['id'], $copyEntity['id'], '"id" was not set correctly');
        $this->assertSame($data['artist'], $copyEntity['artist'], '"artist" was not set correctly');
        $this->assertSame($data['title'], $copyEntity['title'], '"title" was not set correctly');
    }
}
