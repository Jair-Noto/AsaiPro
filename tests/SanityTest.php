<?php

use PHPUnit\Framework\TestCase;

final class SanityTest extends TestCase
{
    private function renderPhpFile(string $file): string
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';

        ob_start();

        try {
            include __DIR__ . '/../' . $file;
        } catch (Throwable $e) {
            ob_end_clean();
            $this->fail("Error al cargar el archivo {$file}: " . $e->getMessage());
        }

        return ob_get_clean();
    }

    public function testIndexPageCanBeLoaded(): void
    {
        $output = $this->renderPhpFile('index.php');
        $this->assertIsString($output);
    }

    public function testIndexOnePageCanBeLoaded(): void
    {
        $output = $this->renderPhpFile('index1.php');
        $this->assertIsString($output);
    }

    public function testRegisterPageCanBeLoaded(): void
    {
        $output = $this->renderPhpFile('register.php');
        $this->assertIsString($output);
    }

    public function testModifyPageCanBeLoaded(): void
    {
        $output = $this->renderPhpFile('modify.php');
        $this->assertIsString($output);
    }

    public function testDeletePageCanBeLoaded(): void
    {
        $output = $this->renderPhpFile('delete.php');
        $this->assertIsString($output);
    }

    public function testCoreFilesExist(): void
    {
        $this->assertFileExists(__DIR__ . '/../Crud.php');
        $this->assertFileExists(__DIR__ . '/../Database.php');
        $this->assertFileExists(__DIR__ . '/../index.php');
        $this->assertFileExists(__DIR__ . '/../register.php');
        $this->assertFileExists(__DIR__ . '/../modify.php');
        $this->assertFileExists(__DIR__ . '/../delete.php');
    }
}