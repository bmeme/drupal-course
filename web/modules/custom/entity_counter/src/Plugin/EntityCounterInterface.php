<?php

namespace Drupal\entity_counter\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Entity counter plugins.
 */
interface EntityCounterInterface extends PluginInspectionInterface {

  /**
   * Count entities.
   *
   * @return int
   *   The total number of entities of the given type.
   */
  public function count();

}
