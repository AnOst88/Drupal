/**
 * @file
 * Simple JavaScript task 94 file.
 */

(function($, Drupal, settings) {

    "use strict";

    Drupal.behaviors.task_js = {
        attach: function(context) {
            document.body.myData = {
                name: 'Include',
                class: 'Include JS'
            };

            alert(document.body.myData.class);
        }
    }

})(jQuery, Drupal, drupalSettings);