<?php

namespace Drupal\config_filter\Tests;

use Drupal\config_filter\Config\StorageFilterInterface;
use Drupal\config_filter\Plugin\ConfigFilterBase;

/**
 * Class TransparentFilter.
 */
class TransparentFilter extends ConfigFilterBase implements StorageFilterInterface {

  /**
   * TransparentFilter constructor.
   */
  public function __construct() {
    parent::__construct([], 'transparent_test', []);
  }

}
