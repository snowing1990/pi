<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt BSD 3-Clause License
 */

namespace Pi\Application\Engine;

use Pi\Command\Mvc\Application;

/**
 * Pi command line application engine
 * 
 * How to use command line:
 * path/to/www/pi {module}/{controller}/{action} param1 param2
 *
 * @author Zongshu Lin <lin40553024@163.com>
 */
class Command extends Standard
{
    /**
     * {@inheritDoc}
     */
    const SECTION = 'command';

    /**
     * {@inheritDoc}
     */
    protected $fileIdentifier = 'command';
    
    /**
     * {@inheritDoc}
     */
    public function application()
    {
        if (!$this->application) {
            $options = isset($this->options['application'])
                       ? $this->options['application'] : array();
            $this->application = Application::load($options);
            $this->application->setEngine($this)->setSection($this->section());
        }

        return $this->application;
    }
}
