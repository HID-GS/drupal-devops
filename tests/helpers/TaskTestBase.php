<?php

namespace HidGlobal\DrupalDevOps\Tests\Helpers;

use Robo\Robo;
use Robo\TaskAccessor;
use PHPUnit\Framework\TestCase;
use League\Container\ContainerAwareTrait;
use League\Container\ContainerAwareInterface;
use Symfony\Component\Console\Output\NullOutput;

/**
 * Base class for testing Tasks.
 */
class TaskTestBase extends TestCase implements ContainerAwareInterface
{

    use TaskAccessor;
    use ContainerAwareTrait;

    protected $container;

    /**
     * Set up a Robo container.
     */
    public function setUp(): void
    {
        $this->container = Robo::createDefaultContainer(null, new NullOutput());
        $this->setContainer($this->container);
    }

    /**
     * Provide a Robo collection builder.
     *
     * @return \Robo\Collection\CollectionBuilder
     *   A collection builder.
     */
    public function collectionBuilder()
    {
        $emptyTaskDefinition = new \Robo\Tasks();

        return $this->getContainer()
            ->get('collectionBuilder', [$emptyTaskDefinition]);
    }
}
