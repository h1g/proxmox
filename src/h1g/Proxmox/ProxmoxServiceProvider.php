<?php 

namespace h1g\Proxmox;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ProxmoxServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
        /**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */       
	public function boot()
	{
        $this->publishes([
            __DIR__.'/../../config/proxmox.php' => config_path('proxmox.php'),
        ]);
	}
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
            $this->app['proxmox'] = $this->app->share(function($app)
		{
            $proxmoxConfig = $app['config'];
            $proxmoxCredetianls = $proxmoxConfig->get('proxmox.server', array());


            return new \ProxmoxVE\Proxmox($proxmoxCredetianls);
		});
	}
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
            return array('proxmox');
	}
}
