<?php

  /**
   * Autoload will include files that exist within Hasnain
   * namespace inside `inc` folder.
   */
  spl_autoload_register(
    fn (string $class_name)
      => strpos($class_name, 'Hasnain') !== false
        && require_once(str_replace('_', '-', $class_name) . '.php'),
  );
