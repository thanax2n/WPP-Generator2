<?php

namespace MXSFWNWPPGNext\Features\API\Interfaces;

interface RestRouteHandlerInterface
{
    
    public function registerRoute();
    public function handleRequest($request);
    public function checkPermissions();
}
