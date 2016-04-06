Proxmox Laravel Bindings
=======

This package is a wrapper for the ProxmoxVE package made by
ZzAntares (https://github.com/zzantares/proxmoxve). This package
allows easy use of the ProxmoxVE package by adding a
facade, and a config file.

License
------
This package is released under the LGPL. (Read LICENSE)

Tl;dr; you can use it in a proprietary project, but if you modify the actual
library, you need to make your changes open source under the LGPL.

Installation
-----
Add the package `h1g/proxmox` to your composer.json

    $ composer require h1g/proxmox 1.*

or

    {
        "require": {
            "h1g/proxmox": "1.*"
        }
    }

Add the service provider and alias to your app.php

    'providers' => [
        // ...
        h1g\Proxmox\ProxmoxServiceProvider::class,
        // ...
    ]

    'aliases' => [
        // ...
        'Proxmox'         => h1g\Proxmox\ProxmoxFacade::class,
        // ...
    ]

Publish the configuration file

    $ php artisan vendor:publish

Fill in `app/config/proxmox.php`. This file contains the Proxmox API 
connection information, and must be filled in before use. 
(you can also fill in the details in your environment file)

Usage
-----

Refer to [the original package](https://github.com/zzantares/proxmoxve) for
documentation. Instead of `$proxmox->`, use `\Proxmox::`

Example:

    $allnodes = \Proxmox::get('/nodes');
    dd($allnodes);

