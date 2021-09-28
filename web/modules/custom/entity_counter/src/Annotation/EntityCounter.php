<?php

namespace Drupal\entity_counter\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Entity counter item annotation object.
 *
 * @see \Drupal\entity_counter\Plugin\EntityCounterManager
 * @see plugin_api
 *
 * @Annotation
 */
class EntityCounter extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
