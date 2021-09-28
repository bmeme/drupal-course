<?php

namespace Drupal\entity_counter\Plugin\EntityCounter;

use Drupal\entity_counter\Annotation\EntityCounter;
use Drupal\entity_counter\Plugin\EntityCounterBase;

/**
 * Class UserCounter.
 *
 * @EntityCounter(
 *   id="user",
 *   label="User"
 * )
 *
 * @package Drupal\entity_counter\Plugin\EntityCounter
 */
class UserCounter extends EntityCounterBase {

  /**
   * {@inheritdoc}
   */
  public function count() {
    $storage = $this->entityTypeManager->getStorage('user');
    $nodes = $storage->loadByProperties();
    return count($nodes);
  }

}
