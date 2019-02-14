# MonogrammProxmoxBundle: Proxmox VE API integration in Symfony

This bundle integrates [ZzAntares Proxmox's unoffical PHP client](https://github.com/ZzAntares/ProxmoxVE) in [the Symfony framework](http://symfony.com).

[![Build Status](https://travis-ci.org/Monogramm/MonogrammProxmoxBundle.svg)](https://travis-ci.org/Monogramm/MonogrammProxmoxBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Monogramm/MonogrammProxmoxBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Monogramm/MonogrammProxmoxBundle/?branch=master) 
[![Latest version](https://img.shields.io/packagist/v/monogramm/proxmox-bundle.svg?style=flat)](https://packagist.org/packages/monogramm/proxmox-bundle)

## Installation

Use [Composer](http://getcomposer.org) to install the bundle:

`composer require monogramm/proxmox-bundle`

Then, update your `app/config/AppKernel.php` file:

```php
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Monogramm\ProxmoxBundle\MonogrammProxmoxBundle(),
            // ...
        );

        return $bundles;
    }
```

Configure the bundle in `app/config/config.yml`:

```yaml
monogramm_proxmox:
    hostname: "%proxmox_hostname%"
    username: "%proxmox_username%"
    password: "%proxmox_password%"
    realm:    "%proxmox_realm%"
    port:     "%proxmox_port%"
```

Finally, update your `app/config/parameters.yml` file to store your Proxmox VE API credentials:

```yaml
parameters:
    # ...
    proxmox_hostname: "proxmox.company.com"
    proxmox_username: "root"
    proxmox_password: "mysupersecretpassword"
    proxmox_realm:    "pam"
    proxmox_port:     "8006"
```

## Usage

The bundle automatically registers a `proxmox` service in the Dependency Injection Container. That service is an instance of `\ProxmoxVE\Proxmox`.

Example usage in a controller:

```php
// ...

    public function nodesAction()
    {
        // Get all nodes
        $this
            ->get('proxmox')
            ->getNodes()
        ;

        // ...
    }

    public function createVmAction($targetnode, $id)
    {
        // Create an lxc container
        $this
            ->get('proxmox')
            ->create(
                "/nodes/$targetnode/lxc",
                [
                    'net0' => 'name=myct0,bridge=vmbr0',
                    'ostemplate' => 'local:vztmpl/debian-8.0-standard_8.0-1_amd64.tar.gz',
                    'vmid' => "$id",
                ]
            )
        ;

        // ...
    }


// ...
```

Contributing
------------

See [CONTRIBUTING](CONTRIBUTING.md) file.


License
-------

See [LICENSE](LICENSE) file.

Author(s)
------------

* [Monogramm](https://github.com/Monogramm)

Awesome Contributors
------------

* [GothShoot](https://github.com/GothShoot)
