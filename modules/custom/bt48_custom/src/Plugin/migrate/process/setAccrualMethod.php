<?php
namespace Drupal\bt48_custom\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 *
 * @MigrateProcessPlugin(
 *   id = "setAccrualMethod"
 * )
 */
class setAccrualMethod extends ProcessPluginBase {
  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
     
        switch (trim(strtolower($value))) {
            case 'purchase':
                return 0;
                break;
            case 'donation':
                return 1;
                break;
            case 'bequest':
                return 2;
                break;
            case 'loan':
                return 3;
                break;
            case 'other':
                return 4;
                break;
        }
    }
}