<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\bt48_custom\Plugin\migrate\process;


use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 *
 * @MigrateProcessPlugin(
 *   id = "setAccrualPolicy"
 * )
 */

class setAccrualPolicy extends ProcessPluginBase {
  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {

        switch(trim(strtolower($value))){
            case 'closed':
                return 0;
                break;
            case 'open':
                return 1;
                break;
            case 'active':
                return 2;
                break;
            case 'passive':
                return 3;
                break;     
            case 'other':
                return 3;
                break;              
        }  
    }
}