<?php

namespace Drupal\entity_counter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\entity_counter\Plugin\EntityCounterInterface;
use Drupal\entity_counter\Plugin\EntityCounterManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class EntityCounterController.
 */
class EntityCounterController extends ControllerBase {

  /**
   * The Entity Counter Manager.
   *
   * @var EntityCounterManager
   */
  protected $counterManager;

  /**
   * EntityCounterController constructor.
   *
   * @param EntityCounterManager $counterManager
   */
  public function __construct(EntityCounterManager $counterManager) {
    $this->counterManager = $counterManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.entity_counter')
    );
  }

  /**
   * Count.
   *
   * @return array
   *   Return a render array.
   */
  public function count() {
    return [
      '#theme' => 'entity_counter',
      '#entities' => $entities = $this->getEntities(),
    ];
  }

  protected function getEntities() {
    $entities = [];
    foreach ($this->counterManager->getDefinitions() as $id => $definition) {
      /** @var EntityCounterInterface $instance */
      $instance = $this->counterManager->createInstance($id);
      $entities[] = [
        'label' => $definition['label'],
        'count' => $instance->count(),
      ];
    }
    return $entities;
  }

}
