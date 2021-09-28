<?php

namespace Drupal\pagina_colorata\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\pagina_colorata\ColorPluginManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class PaginaColorataController.
 *
 * @package Drupal\pagina_colorata\Controller
 */
class PaginaColorataController extends ControllerBase {

  /**
   * The Color Plugin Manager service instance.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $colorManager;

  /**
   * PaginaColorataController constructor.
   *
   * @param ColorPluginManagerInterface $colorManager
   *   The Color Plugin Manager service instance.
   */
  public function __construct(ColorPluginManagerInterface $colorManager) {
    $this->colorManager = $colorManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.color_plugin')
    );
  }

  /**
   * View a coloured page.
   *
   * @return array
   *   Return Hello string.
   */
  public function view() {
    return [
      '#theme' => 'pagina_colorata',
      '#colors' => $this->getColors(),
    ];
  }

  /**
   * Get colors.
   *
   * @return array
   *   An array of colors.
   */
  protected function getColors() {
    $colors = [];
    foreach ($this->colorManager->getDefinitions() as $definition) {
      $colors[] = $definition['color'];
    }
    return $colors;
  }

}
