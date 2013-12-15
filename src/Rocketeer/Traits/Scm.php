<?php
/*
 * This file is part of Rocketeer
 *
 * (c) Maxime Fabre <ehtnam6@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Rocketeer\Traits;

/**
 * An abstract class with helpers for SCM implementations
 *
 * @author Maxime Fabre <ehtnam6@gmail.com>
 */
abstract class Scm
{
	/**
	 * The IoC Container
	 *
	 * @var Container
	 */
	protected $app;

	/**
	 * Build a new Git instance
	 *
	 * @param Container $app
	 */
	public function __construct($app)
	{
		$this->app = $app;
	}

	////////////////////////////////////////////////////////////////////
	//////////////////////////////// HELPERS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Returns a command with the SCM's binary
	 *
	 * @param  string $command
	 *
	 * @return string
	 */
	public function getCommand($command)
	{
		return $this->binary. ' ' .$command;
	}

	/**
	 * Execute one of the commands
	 *
	 * @param  string $command
	 * @param  string $arguments,...
	 *
	 * @return mixed
	 */
	public function execute()
	{
		$arguments = func_get_args();
		$command   = array_shift($arguments);
		$command   = call_user_func_array(array($this, $command), $arguments);

		return $this->app['rocketeer.bash']->run($command);
	}
}
