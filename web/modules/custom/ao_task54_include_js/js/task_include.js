/**
 * @file
 * Simple JavaScript task 54 file.
 */

(function($, Drupal) {

    "use strict";

    Drupal.behaviors.alertJs = {
        attach:function() {
            alert("Some alert");
        }
    };

}(jQuery, Drupal));
