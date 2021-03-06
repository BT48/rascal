<?php

namespace Drupal\js;

use Drupal\Component\Plugin\FallbackPluginManagerInterface;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ThemeHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Theme\ThemeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class CallbackManager.
 */
class JsCallbackManager extends DefaultPluginManager implements ContainerInjectionInterface, ContainerAwareInterface, FallbackPluginManagerInterface {

  use ContainerAwareTrait;
  use StringTranslationTrait;

  /**
   * @var \Drupal\Core\Extension\ThemeHandlerInterface
   */
  protected $themeHandler;

  /**
   * @var \Drupal\Core\Theme\ThemeManagerInterface
   */
  protected $themeManager;

  /**
   * Plugin manager for JS Callback Handler callbacks.
   *
   * @param \ArrayObject $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   * @param \Drupal\Core\Extension\ThemeHandlerInterface $theme_handler
   *   The theme manager used to invoke the alter hook with.
   * @param \Drupal\Core\Theme\ThemeManagerInterface $theme_manager
   *   The theme manager used to invoke the alter hook with.
   */
  public function __construct(\ArrayObject $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler, ThemeHandlerInterface $theme_handler, ThemeManagerInterface $theme_manager) {
    // Fix the namespaces.
    $this->fixNamespaces($namespaces);

    // Set the theme handler and manager.
    $this->themeHandler = $theme_handler;
    $this->themeManager = $theme_manager;

    // Construct the plugin manager now.
    parent::__construct('Plugin/Js', $namespaces, $module_handler, '\\Drupal\\js\\Plugin\\Js\\JsCallbackInterface', '\\Drupal\\js\\Annotation\\JsCallback');
    $this->alterInfo('js_callbacks');
    $this->setCacheBackend($cache_backend, 'js_callbacks');
  }

  /**
   * Fixes namespaces to include themes.
   *
   * The "container.namespaces" service does not contain theme namespaces
   * since themes are not registered in the container. To allow themes to be
   * able to participate in these plugins, the normal "namespaces" provided
   * must be appending with the missing autoloader prefixes of the themes.
   *
   * @param \ArrayObject $namespaces
   */
  public function fixNamespaces($namespaces) {
    /** @var \Composer\Autoload\ClassLoader $class_loader */
    $class_loader = \Drupal::service('class_loader');

    $ns = $namespaces->getArrayCopy();
    foreach ($class_loader->getPrefixesPsr4() as $prefix => $paths) {
      // Remove trailing path separators.
      $prefix = trim($prefix, '\\');

      // Remove the DRUPAL_ROOT prefix.
      $path = str_replace(\Drupal::root() . '/', '', reset($paths));

      // Only add missing contrib theme namespaces.
      if (preg_match('/^(core|vendor)/', $path) === 0 && !isset($namespaces[$prefix])) {
        $ns[$prefix] = $path;
      }
    }
    // Replace the namespaces data.
    $namespaces->exchangeArray($ns);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('container.namespaces'),
      $container->get('cache.discovery'),
      $container->get('module_handler'),
      $container->get('theme_handler'),
      $container->get('theme.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function alterDefinitions(&$definitions) {
    if ($this->alterHook) {
      $this->moduleHandler->alter($this->alterHook, $definitions);
      $this->themeManager->alter($this->alterHook, $definitions);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getFallbackPluginId($plugin_id, array $configuration = []) {
    return 'js.content';
  }

  /**
   * {@inheritdoc}
   */
  protected function providerExists($provider) {
    return $this->moduleHandler->moduleExists($provider) || $this->themeHandler->themeExists($provider);
  }

}
