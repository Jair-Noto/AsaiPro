<?php

use PHPUnit\Framework\TestCase;

final class SanityTest extends TestCase
{
    public function testProjectFilesExist(): void
    {
        $this->assertFileExists(__DIR__ . '/../Crud.php');
        $this->assertFileExists(__DIR__ . '/../Database.php');
        $this->assertFileExists(__DIR__ . '/../index.php');
        $this->assertFileExists(__DIR__ . '/../register.php');
        $this->assertFileExists(__DIR__ . '/../modify.php');
        $this->assertFileExists(__DIR__ . '/../delete.php');
    }
}
