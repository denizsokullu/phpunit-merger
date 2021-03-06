<?php
namespace Nimut\PhpunitMerger\Tests\Command;

use Nimut\PhpunitMerger\Command\LogCommand;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\OutputInterface;

class LogCommandTest extends AbstractCommandTest
{
    /**
     * @var string
     */
    protected $outputFile = 'log.xml';

    public function testRunMergesCoverage()
    {
        $this->assertOutputFileNotExists();

        $input = new ArgvInput(
            [
                'log',
                $this->logDirectory . 'log/',
                $this->logDirectory . $this->outputFile,
            ]
        );
        $output = $this->prophesize(OutputInterface::class);

        $command = new LogCommand();
        $command->run($input, $output->reveal());

        $this->assertFileExists($this->logDirectory . $this->outputFile);
    }
}
