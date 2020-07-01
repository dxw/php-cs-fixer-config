<?php

namespace Dxw\PhpCsFixerConfig;

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    public function setUp() : void
    {
        $this->dir = __DIR__.'/test-dir';
        $this->file = $this->dir.'/test.php';
    }

    public function rmDir()
    {
        exec("rm -rf {$this->dir}");
    }

    public function runPhpCsFixer(string $code, bool $expectZero)
    {
        $this->rmDir();
        mkdir($this->dir);
        file_put_contents($this->dir.'/.php_cs', '<?php $finder = \PhpCsFixer\Finder::create()->in(__DIR__); return \Dxw\PhpCsFixerConfig\Config::create()->setFinder($finder);');
        file_put_contents($this->file, $code);
        exec("sh -c 'cd {$this->dir} && ../../vendor/bin/php-cs-fixer fix --dry-run --diff 2>&1'", $output, $exitStatus);
        $stringOutput = sprintf("Input:\n%s\nOutput:\n%s\n", $code, implode("\n", $output));
        if ($expectZero) {
            $this->assertEquals($exitStatus, 0, $stringOutput);
        } else {
            $this->assertNotEquals($exitStatus, 0, $stringOutput);
        }
    }

    public function expectFailure(string $code)
    {
        $this->runPhpCsFixer($code, false);
    }

    public function expectSuccess(string $code)
    {
        $this->runPhpCsFixer($code, true);
    }

    public function tearDown() : void
    {
        $this->rmDir();
    }

    public function testEmptyFile()
    {
        $this->expectSuccess("<?php");
        $this->expectSuccess("<?php\n");
    }

    public function testLongArray()
    {
        $this->expectFailure("<?php \$a = array();\n");
        $this->expectSuccess("<?php \$a = [];\n");
    }

    // PSR2
    public function testSnakeCaseFunctions()
    {
        $this->expectFailure("<?php function a_b() {\n}\n");
    }
}
