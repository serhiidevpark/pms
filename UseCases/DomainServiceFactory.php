<?php

declare(strict_types=1);

namespace UseCases;

use Auth\AuthService;
use CodebaseRepository\RepositoryService;
use Company\CompanyInvoices;
use Company\CompanyList;
use Company\CompanyProfile;
use Company\CompanyService;
use Company\CompanyUsers;
use Company\CustomerProfileService;
use Contractor\ContractorProfile;
use Contractor\ContractorService;
use Contractor\ContractorsList;
use Contractor\ContractorUsers;
use File\AvatarRepository;
use Illuminate\Foundation\Application;
use Illuminate\Log\Logger;
use Illuminate\Support\Arr;
use Invoice\InvoiceAttachment;
use Invoice\InvoiceService;
use Project\ProjectCommitMessage;
use Project\ProjectFile;
use Project\ProjectFSC;
use Project\ProjectNewTestRequest;
use Project\ProjectPDF;
use Project\ProjectPdfService;
use Project\ProjectProviderRequest;
use Project\ProjectService;
use Project\ProjectSettingsService;
use Project\ProjectStatistics;
use Project\ProjectStatusManger;
use Project\ProjectSuite;
use Project\UnionProjects;
use Project\ProjectTest;
use Project\ProjectTestRequest;
use Project\ProjectUnmarked;
use Project\ProjectUpdateTests;
use Project\UserProject;
use TestExecution\TestExecutionEnvironment;
use TestExecution\TestExecutionService;
use TestExecution\TestExecutionStatusManager;
use Union\UnionFSC;
use Union\UnionProfile;
use Union\ProjectsUsers;
use Union\UnionProjectService;
use Union\UnionsList;
use Union\UnionTests;
use UseCases\Contracts\Company\ICompanyInvoices;
use UseCases\Contracts\Company\ICompanyList;
use UseCases\Contracts\Company\ICompanyProfile;
use UseCases\Contracts\Company\ICompanyUsers;
use UseCases\Contracts\Company\ICustomerProfile;
use UseCases\Contracts\Contractor\IContractorProfile;
use UseCases\Contracts\Contractor\IContractorService;
use UseCases\Contracts\Contractor\IContractorsList;
use UseCases\Contracts\Contractor\IContractorUsers;
use UseCases\Contracts\File\IAvatarRepository;
use UseCases\Contracts\IAuth;
use UseCases\Contracts\ICodebaseRepository;
use UseCases\Contracts\ICompany;
use UseCases\Contracts\Invoice\IInvoiceAttachment;
use UseCases\Contracts\Invoice\IInvoiceService;
use UseCases\Contracts\IProject;
use UseCases\Contracts\IProjectCommitMessage;
use UseCases\Contracts\IProjectFiles;
use UseCases\Contracts\IProjectFSC;
use UseCases\Contracts\IProjectNewTestRequest;
use UseCases\Contracts\IProjectPDF;
use UseCases\Contracts\IProjectPdfService;
use UseCases\Contracts\IProjectStatistics;
use UseCases\Contracts\IProjectStatus;
use UseCases\Contracts\IProjectSuite;
use UseCases\Contracts\IUnionProjects;
use UseCases\Contracts\IProjectTest;
use UseCases\Contracts\IProjectTestRequest;
use UseCases\Contracts\IProjectUnmarked;
use UseCases\Contracts\IProjectUpdateTests;
use UseCases\Contracts\ITestExecution;
use UseCases\Contracts\ITestExecutionEnvironment;
use UseCases\Contracts\ITestExecutionStatus;
use UseCases\Contracts\IUserProject;
use UseCases\Contracts\Project\IProjectSettingsService;
use UseCases\Contracts\Project\IProviderRequest;
use UseCases\Contracts\Union\IUnionFSC;
use UseCases\Contracts\Union\IUnionProfile;
use UseCases\Contracts\Union\IProjectsUsers;
use UseCases\Contracts\Union\IUnionProjectService;
use UseCases\Contracts\Union\IUnionsList;
use UseCases\Contracts\Union\IUnionTests;
use UseCases\Contracts\User\IUserProfile;
use UseCases\Contracts\User\IUserService;
use User\UserProfile;
use User\UserService;

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
