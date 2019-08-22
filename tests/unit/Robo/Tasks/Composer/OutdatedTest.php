<?php

namespace DrupalDevOps\Tests\Robo\Tasks\Composer;

use DrupalDevOps\Tests\Helpers\TaskTestBase;
use DrupalDevOps\Robo\Tasks\Composer\LoadTasks;

/**
 * @covers \HidGlobal\DrupalDevOps\Robo\Plugin\Tasks\Composer\Outdated
 */
class OutdatedTest extends TaskTestBase
{

    use LoadTasks;

    /**
     * Test the `package` option.
     */
    public function testPackageOption()
    {
        $command = $this->taskComposerOutdated('composer')
            ->package('drupal/core')
            ->getCommand();
        $this->assertEquals('composer outdated drupal/core', $command);
    }

    /**
     * Test the `all` option.
     */
    public function testAllOption()
    {
        $command = $this->taskComposerOutdated('composer')
            ->all()
            ->getCommand();
        $this->assertEquals('composer outdated --all', $command);
    }

    /**
     * Test the `minor-only` option.
     */
    public function testMinorOnlyOption()
    {
        $command = $this->taskComposerOutdated('composer')
            ->minorOnly()
            ->getCommand();
        $this->assertEquals('composer outdated --minor-only', $command);
    }

    /**
     * Test the `direct` option.
     */
    public function testDirectOption()
    {
        $command = $this->taskComposerOutdated('composer')
            ->direct()
            ->getCommand();
        $this->assertEquals('composer outdated --direct', $command);
    }

    /**
     * Test the `strict` option.
     */
    public function testStrictOption()
    {
        $command = $this->taskComposerOutdated('composer')
            ->strict()
            ->getCommand();
        $this->assertEquals('composer outdated --strict', $command);
    }

    /**
     * Test the `format` option.
     */
    public function testformatOption()
    {
        $command = $this->taskComposerOutdated('composer')
            ->format('json')
            ->getCommand();
        $this->assertEquals('composer outdated --format json', $command);
    }
}
