<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\bt48Custom;

/**
 * Description of BT48Migrate
 *
 * @author kevin
 */
class BT48Migrate {
    //put your code here
    
    public static function setAccrualMehtod($text){
        switch(trim(strtolower($text))){
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
    
    public static function setAccrualPeriodicity($text){
        
        switch(trim(strtolower($text))){
            case 'regular':
                return 0;
                break;
            case 'irregular':
                return 1;
                break;
            case 'closed':
                return 2;
                break;
            case 'other':
                return 3;
                break;     
        }
    }
    
    public static function setAccrualPolicy($text){
        
        switch(trim(strtolower($text))){
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
