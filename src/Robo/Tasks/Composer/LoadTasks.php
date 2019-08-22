<?php

namespace DrupalDevOps\Robo\Tasks\Composer;

trait LoadTasks
{
    /**
     * @param null|string $pathToComposer
     *
     * @return Outdated
     */
    protected function taskComposerOutdated($pathToComposer = null)
    {
        return $this->task(Outdated::class, $pathToComposer);
    }
}
