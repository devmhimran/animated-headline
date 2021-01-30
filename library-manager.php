<?php

    add_action( 'elementor/init', function() {
       require_once 'includes/library/library-source.php';
        //include_once (plugin_dir_path( __FILE__ ) . 'includes/library/library-source.php' );
        
        // Unregister source with closure binding, thank Steve.
        $unregister_source = function($id) {
            unset( $this->_registered_sources[ $id ] );
        };

        $unregister_source->call( \Elementor\Plugin::instance()->templates_manager, 'remote');
        \Elementor\Plugin::instance()->templates_manager->register_source( 'Elementor\TemplateLibrary\Rig_Templates' );
    }, 15 );
