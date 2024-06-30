<?php

namespace MXSFWNWPPGNext\Admin;

use MXSFWNWPPGNext\Admin\Utilities\AdminEnqueueScripts;
use MXSFWNWPPGNext\Admin\Utilities\PostTypeGenerator;
use MXSFWNWPPGNext\Admin\Utilities\TaxonomyGenerator;
use MXSFWNWPPGNext\Admin\Utilities\MetaBoxGenerator;

class AdminSoul
{

    public function __construct()
    {

        $this->routing();

        $this->enqueueScripts();

        $this->registerPostTypes();

        $this->registerTaxonomies();

        $this->addMetaBoxes();
    }

    public function routing()
    {

        require_once MXSFWN_PLUGIN_ABS_PATH . 'includes/Admin/routes.php';
    }

    public function enqueueScripts()
    {

        // Enqueue Scripts
        AdminEnqueueScripts::addScripts();
        
        // Enqueue Styles
        AdminEnqueueScripts::addStyles();
    }

    public function registerPostTypes()
    {

        PostTypeGenerator::registerFrameworkPostType();
    }

    public function registerTaxonomies()
    {

        TaxonomyGenerator::registerLanguageTaxonomy();
    }

    public function addMetaBoxes()
    {

        MetaBoxGenerator::addPageMetaBoxes();
    }
}
