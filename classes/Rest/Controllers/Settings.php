<?php
namespace VendorNamespace\PluginNamespace\Rest\Controllers;


class Settings extends Controller {


    public function get(){
        $settings = $this->plugin->getSettings()->getAll();
        return [
            'settings' => $settings
        ];

    }
}
