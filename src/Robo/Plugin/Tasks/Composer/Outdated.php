<?php

namespace HidGlobal\DrupalDevOps\Robo\Plugin\Tasks\Composer;

use Robo\Task\Composer\Base;

/**
 * Composer Outdated
 *
 * A wrapper for the outdated command.
 *
 * ``` php
 * $this->taskComposerOutdated()
 *    ->all()
 *    ->minorOnly()
 *    ->direct()
 *    ->strict()
 *    ->format('json')
 *    ->run();
 * ```
 */
class Outdated extends Base
{
    /**
     * {@inheritdoc}
     */
    protected $action = 'outdated';

    /**
     * Adds `all` option.
     *
     * @param bool $all
     *
     * @return $this
     */
    public function all($all = true)
    {
        if ($all) {
            $this->option('--all');
        }
        return $this;
    }

    /**
     * Adds `minor-only` option.
     *
     * @param bool $minor
     *
     * @return $this
     */
    public function minorOnly($minor = true)
    {
        if ($minor) {
            $this->option('--minor-only');
        }
        return $this;
    }

    /**
     * Adds `direct` option.
     *
     * @param bool $direct
     *
     * @return $this
     */
    public function direct($direct = true)
    {
        if ($direct) {
            $this->option('--direct');
        }
        return $this;
    }

    /**
     * Adds `strict` option.
     *
     * @param bool $strict
     *
     * @return $this
     */
    public function strict($strict = true)
    {
        if ($strict) {
            $this->option('--strict');
        }
        return $this;
    }

    /**
     * Adds `format` option.
     *
     * @param string $format
     *
     * @return $this
     */
    public function format($format = 'text')
    {
        if (!empty($format)) {
            $this->option('--format', $format);
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $command = $this->getCommand();
        $this->printTaskInfo('Checking outdated packages: {command}', ['command' => $command]);
        return $this->executeCommand($command);
    }
}
