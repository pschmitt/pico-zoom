<?php

/**
 * pico-zoom
 *
 * This plugin requires jkit 1.2.* with the zoom feature
 *
 * Add font size increase/decrease button to your Pico site
 * @author Philipp Schmitt
 * @link https://github.com/pschmitt/pico-zoom
 * @license http://www.gnu.org/licenses/gpl.txt
 *
 */

class Pico_Zoom {

    private $zoom_inc_text = '+';
    private $zoom_dec_text = '-';
    private $zoom_steps = 1;
    private $affected_selector = 'div.post';
    private $init_right_ahead = true;

    public function config_loaded(&$settings) {
        if (isset($settings['zoom_steps'])) {
            $this->zoom_steps = $settings['zoom_steps'];
        }
        if (isset($settings['zoom_affected_selector'])) {
            $this->affected_selector = $settings['affected_selector'];
        }
        if (isset($settings['zoom_init_right_ahead'])) {
            $this->init_right_ahead = $settings['zoom_init_right_ahead'];
        }
    }

    public function before_render(&$twig_vars, &$twig) {
        $twig_vars['zoom_buttons'] = '
        <input type="button" value="bigger" data-jkit="[fontsize:steps='  . $this->zoom_steps .';affected=' . $this->affected_selector . ']">
        <input type="button" value="smaller" data-jkit="[fontsize:steps=-'. $this->zoom_steps .';affected=' . $this->affected . ']">';
        if ($this->init_right_ahead) {
            $twig_vars['zoom_buttons'] .= '<script type="text/javascript">
                $(document).ready(function(){
                    $("body").jKit();
                });
            </script>
            ';
        }
    }
}
