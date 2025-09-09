<?php

namespace App\Services;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\GymRepositoryInterface;
use App\Repositories\Contracts\SubscribePackageRepositoryInterface;

class FrontService
{
    protected $gymRepository;
    protected $cityRepository;
    protected $subscribePackageRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        GymRepositoryInterface $gymRepository,
        SubscribePackageRepositoryInterface $subscribePackage
    ) {
        $this->cityRepository = $cityRepository;
        $this->gymRepository = $gymRepository;
        $this->subscribePackageRepository = $subscribePackage;
    }

    public function getFrontPageData()
    {
        $cities = $this->cityRepository->getAllCities();
        $popularGyms = $this->gymRepository->getPopularGyms(4);
        $newGyms = $this->gymRepository->getAllNewGyms();

        return compact('cities', 'popularGyms', 'newGyms');
    }

    public function getSubscriptionsData()
    {
        $subscribePackages = $this->subscribePackageRepository->getAllSubscribePackages();
        return compact('subscribePackages');
    }
}
