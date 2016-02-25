<?php

class Shopware_Plugins_Backend_Bestellnummer_Bootstrap extends Shopware_Components_Plugin_Bootstrap {

    // Provide some basic information
    private $label = 'Bestellnummer Healer';

    private $author = 'Zepcom';

    private $copyright = 'Copyright © 2016, Zepcom';

    // return this basic information
    public function getInfo() {

        return [
            'label' => $this->label,
            'author' => $this->author,
            'copyright' => $this->copyright
        ];

    }

    // set capabalities in your plugin
    public function getCapabilities() {

        return [
            'install' => true,
            'enable' => true,
            'update' => true
        ];

    }

    /**
     * after plugin is initilized,
     * add the view directory to the application
     */
    public function afterInit() {

    
    }

    // install method
    public function install() {

        try {

                // register controller
            $this->registerController('Backend', 'Bestellnummer');
          

            // create menu item
            $this->createMenu();
           
            return [
                'success' => true,
                'invalidateCache' => ['backend', 'theme']
            ];


        } catch (Exception $e) {

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];

        }

    }

    public function createMenu() {

        // Specifications of your menu item
        $this->createMenuItem(
            [
                'label' => 'Bestellungen / Bestellnummern Healer',
                'controller' => 'Bestellnummer',
                'class' => 'sprite-application-block',
                'action' => 'Index',
                'active' => 1,
                'parent' => $this->Menu()->findOneBy(['label' => 'Artikel'])
            ]
        );

    }

    public function uninstall() {

        try {
            
   
            return [
                'success' => true,
                'invalidateCache' => ['backend', 'theme']
            ];

        } catch (Exception $e) {

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];

        }

    }

    

}