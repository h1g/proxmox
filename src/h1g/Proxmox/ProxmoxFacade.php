<?php 

namespace h1g\Proxmox;

use Illuminate\Support\Facades\Facade;

class ProxmoxFacade extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'proxmox'; }
}