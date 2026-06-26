<?php

use PHPUnit\Framework\TestCase;

final class SanityTest extends TestCase
{
    private function renderPhpFile(string $file): string
    {
        $path = __DIR__ . '/../' . $file;

        if (!file_exists($path)) {
            $this->markTestSkipped("El archivo {$file} no existe en el repositorio.");
        }

        $_SERVER['REQUEST_METHOD'] = 'GET';

        ob_start();

        try {
            include $path;
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

    public function testCrudFileCanBeLoaded(): void
    {
        $output = $this->renderPhpFile('Crud.php');
        $this->assertIsString($output);
    }

    public function testDatabaseFileCanBeLoaded(): void
    {
        $output = $this->renderPhpFile('Database.php');
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
}