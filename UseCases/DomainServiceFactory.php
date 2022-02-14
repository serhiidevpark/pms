<?php

declare(strict_types=1);

namespace UseCases;

use Illuminate\Foundation\Application;
use Illuminate\Log\Logger;
use Illuminate\Support\Arr;

class DomainServiceFactory
{
    /**
     * @var Logger
     */
    protected $logger;
    /**
     * @var Application
     */
    protected $app;

    protected $bindings = [
//        IAuth::class => AuthService::class,
    ];

    /**
     * DomainServiceFactory constructor.
     *
     * @param Application $app
     * @param Logger $logger
     */
    public function __construct(Application $app, Logger $logger)
    {
        $this->logger = $logger;
        $this->app = $app;
    }

    /**
     * @param string $interface
     * @param null $params
     *
     * @return mixed
     */
    public function create(string $interface, $params = null)
    {
        $service_class = Arr::get($this->bindings, $interface);

        try {
            return $this->app->make($service_class);
        } catch (\Throwable $throwable) {
            $this->logger->error($throwable->getMessage());
            throw new DomainServiceException($interface, $params);
        }
    }
}
