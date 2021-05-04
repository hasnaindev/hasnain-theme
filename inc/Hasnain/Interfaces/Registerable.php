<?php

  namespace Hasnain\Interfaces;

  if (interface_exists('Registerable')) return;

  interface Registerable
  {
    function register(): void;
  }
