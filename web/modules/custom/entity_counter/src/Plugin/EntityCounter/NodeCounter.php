<?php


namespace Drupal\entity_counter\Plugin\EntityCounter;


use Drupal\entity_counter\Annotation\EntityCounter;
use Drupal\entity_counter\Plugin\EntityCounterBase;

/**
 * Class NodeCounter.
 *
 * @EntityCounter(
 *   id="node",
 *   label="Node"
 * )
 *
 * @package Drupal\entity_counter\Plugin\EntityCounter
 */
class NodeCounter extends EntityCounterBase {

  /**
   * {@inheritdoc}
   */
  public function count() {
    $storage = $this->entityTypeManager->getStorage('node');
    $nodes = $storage->loadByProperties();
    return count($nodes);
  }

}
