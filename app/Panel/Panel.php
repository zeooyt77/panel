<?php

namespace Finexlyx\Panel;

class Panel {
    protected $version = '1.0.0';
    protected $settings;
    
    public function __construct() {
        $this->settings = new Settings();
    }

    public function getVersion() {
        return $this->version;
    }

    public function initialize() {
        // Initialize core components
        $this->initializeDatabase();
        $this->loadServices();
        $this->setupRoutes();
    }
}