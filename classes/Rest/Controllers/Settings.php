<?php
namespace VendorNamespace\PluginNamespace\Rest\Controllers;


class Settings extends Controller {


    /**
     * Get settings via API
     *
     * @return array
     */
    public function get(){
        $settings = $this->plugin->getSettings()->getAll();
        return [
            'settings' => $settings
        ];
    }

    /**
     * Update settings via API
     *
     * @param \WP_REST_Request $request
     * @return array
     */
    public function update($request ){
        $key = $request->get_param('apiKey');
        $this->plugin->getSettings()->save([
            'apiKey' => $key
        ]);
        $settings = $this->plugin->getSettings()->getAll();
        return [
            'settings' => $settings
        ];
    }
}
