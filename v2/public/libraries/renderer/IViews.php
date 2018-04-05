<?php

/**
* IViews interface would to structure main classes manager to build properly views
*/

interface IViews
{
  public function get($property = null);
  public function set($property = null, $value = null);
}
