<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author jchen
 */

class Image {
    public $image_path;
    public $image_name;
    public $image_width;
    public $image_height;
    public $image_alt;
    
    function get_path() {
        return $this -> image_path;
    }
    function set_path($path) {
        $this -> image_path = $path;
    }
    function get_name() {
        return $this -> image_name;
    }
    function set_path($image_name) {
        $this -> image_name = $image_name;
    }
    function get_width() {
        return $this -> image_width;
    }
    function set_width($width) {
        $this -> image_width = $width;
    }
    function get_height() {
        return $this -> image_height;
    }
    function set_height($height) {
        $this -> image_height = $height;
    }
    function get_alt() {
        return $this -> image_alt;
    }
    function set_alt($alt) {
        $this -> image_alt = $alt;
    }
}