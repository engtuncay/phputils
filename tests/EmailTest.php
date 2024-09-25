<?php
declare(strict_types=1);

require_once __DIR__ . "/LogConfig.php";

use PHPUnit\Framework\TestCase;
use Engtuncay\Phputils\Dep\Email;

final class EmailTest extends TestCase
{
    /**
     * $$# comment anchor
     */
    public function testCanBeCreatedFromValidEmail(): void
    {
        $string = 'user@example.com';

        global $log;
        $log->addError('Bar');

        $email = Email::fromString($string);

        $this->assertSame($string, $email->asString());
    }

    public function testCannotBeCreatedFromInvalidEmail(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }
}
