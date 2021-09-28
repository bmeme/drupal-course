<?php

namespace Drupal\entity_counter\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Entity counter plugin manager.
 */
class EntityCounterManager extends DefaultPluginManager {


  /**
   * Constructs a new EntityCounterManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/EntityCounter', $namespaces, $module_handler, 'Drupal\entity_counter\Plugin\EntityCounterInterface', 'Drupal\entity_counter\Annotation\EntityCounter');

    $this->alterInfo('entity_counter_entity_counter_info');
    $this->setCacheBackend($cache_backend, 'entity_counter_entity_counter_plugins');
  }

}
