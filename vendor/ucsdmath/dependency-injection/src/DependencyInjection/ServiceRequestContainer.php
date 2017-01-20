<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UCSDMath\DependencyInjection;

use UCSDMath\Configuration\ConfigurationInterface;

/**
 * ServiceRequestContainer is the default implementation of {@link ServiceRequestContainerInterface} which
 * provides routine dependency-injection methods that are commonly used throughout the framework.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
class ServiceRequestContainer extends AbstractServiceRequestContainer implements ServiceRequestContainerInterface
{
    /**
     * Constants.
     *
     * @var string VERSION  A version number
     *
     * @api
     */
    const VERSION = '1.5.0';

    // --------------------------------------------------------------------------

    /**
     * Properties
     *
     * @var AuthenticationInterface     Authentication      A AuthenticationInterface instance
     * @var Benchmark                   Benchmark           A Benchmark instance
     * @var ConfigurationInterface      Config              A ConfigurationInterface instance
     * @var ConfigurationVaultInterface ConfigurationVault  A ConfigurationVaultInterface instance
     * @var HttpKernelInterface         Application         A HttpKernelInterface instance
     * @var DatabaseInterface           Database            A DatabaseInterface instance
     * @var DateTime                    DateTime            A DateTime instance
     * @var DateTimezone                DateTimezone        A DateTimezone instance
     * @var Dumper                      Dumper              A Symfony Yaml Dumper instance
     * @var EventDispatcher             EventDispatcher     A Symfony EventDispatcher instance
     * @var mysqli                      dbh                 A mysqli instance
     * @var EncryptionInterface         Encryption          A EncryptionInterface instance
     * @var ErrorHandlerInterface       ErrorHandler        A ErrorHandlerInterface instance
     * @var FilesystemInterface         Filesystem          A FilesystemInterface instance
     * @var FunctionsInterface          Functions           A FunctionsInterface instance
     * @var mPDF                        mPDF                A mPDF instance
     * @var Request                     Request             A Symfony Request instance
     * @var Response                    Response            A Symfony Response instance
     * @var SessionManager              SessionManager      A Symfony SessionInterface instance
     * @var RouteCollection             RouteCollection     A Symfony RouteCollection instance
     * @var Parser                      Parser              A Symfony Yaml Parser instance
     * @var HtmlInterface               Html                A HtmlInterface instance
     * @var ImageInterface              Image               A ImageInterface instance
     * @var JsonInterface               Json                A JsonInterface instance
     * @var QuikReportsInterface        QuikReports         A QuikReportsInterface instance
     * @var LoggerInterface             Logger              A LoggerInterface instance
     * @var PdfInterface                Pdf                 A PdfInterface instance
     * @var SecurityInterface           Security            A SecurityInterface instance
     * @var MailerInterface             Mailer              A MailerInterface instance
     * @var SessionInterface            Session             A Session Interface instance
     * @var Session                     SessionManager      A Symfony Session Interface instance
     * @var SftpInterface               SftpConnection      A SftpInterface instance
     * @var Swift_Mailer                Swift_Mailer        A Swift_Mailer instance
     * @var Swift_Message               Swift_Message       A Swift_Message instance
     * @var Swift_MailTransport         Swift_MailTransport A Swift_MailTransport instance
     * @var TemplateFactoryInterface    TemplateFactory     A TemplateFactoryInterface instance
     * @var TemplateFactoryInterface    ViewFactory         A TemplateFactoryInterface instance
     * @var ValidationInterface         Validation          A ValidationInterface instance
     * @var XmlInterface                Xml                 A XmlInterface instance
     * @var YamlInterface               Yaml                A YamlInterface instance
     * @var PersistenceInterface        Persistence         A Persistence instance
     * @var PithosInterface             Pithos              A Pithos instance
     */

    public $storageRegister = [
        'Application'        => [
            'interface'      => '\Symfony\Component\HttpKernel\HttpKernelInterface',
            'class'          => '\UCSDMath\Framework\Core\Application',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'RouteCollection',
                                    'class' => 'EventDispatcher',
                                ]
        ],
        'Authentication'     => [
            'interface'      => '\UCSDMath\Authentication\AuthenticationInterface',
            'class'          => '\UCSDMath\Authentication\Authentication',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Database',
                                    'class' => 'Encryption',
                                ]
        ],
        'Benchmark'          => [
            'interface'      => '\UCSDMath\Testing\BenchmarkInterface',
            'class'          => '\UCSDMath\Testing\Benchmark',
            'object'         => null,
            'parameters'     => null
        ],
        'Config'             => [
            'interface'      => '\UCSDMath\Configuration\ConfigurationInterface',
            'class'          => '\UCSDMath\Configuration\Config',
            'object'         => null,
            'parameters'     => null
        ],
        'ConfigurationVault' => [
            'interface'      => '\UCSDMath\Configuration\ConfigurationVault\ConfigurationVaultInterface',
            'class'          => '\UCSDMath\Configuration\ConfigurationVault\ConfigurationVault',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Filesystem',
                                    'class' => 'Yaml',
                                ]
        ],
        'Database'           => [
            'interface'      => '\UCSDMath\Database\DatabaseInterface',
            'class'          => '\UCSDMath\Database\Database',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Request',
                                    'class' => 'Functions',
                                    'class' => 'ConfigurationVault',
                                ]
        ],
        'DateTime'           => [
            'interface'      => '\DateTime',
            'class'          => '\DateTime',
            'object'         => null,
            'parameters'     => [
                                    'string' => null,
                                    'class'  => 'DateTimezone'
                                ]
        ],
        'DateTimezone'       => [
            'interface'      => '\DateTimezone',
            'class'          => '\DateTimezone',
            'object'         => null,
            'parameters'     => [
                                    'string' => 'static::TIMEZONE'
                                ]
        ],
        'Dumper'             => [
            'interface'      => '\Symfony\Component\Yaml\Dumper',
            'class'          => '\Symfony\Component\Yaml\Dumper',
            'object'         => null,
            'parameters'     => null
        ],
        'dbh'                => [
            'interface'      => '\mysqli',
            'class'          => '',
            'object'         => null,
            'parameters'     => [
                                    'string' => 'webadmin'
                                ]
        ],
        'Encryption'         => [
            'interface'      => '\UCSDMath\Encryption\EncryptionInterface',
            'class'          => '\UCSDMath\Encryption\Encryption',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'ConfigurationVault',
                                ]
        ],
        'ErrorHandler'       => [
            'interface'      => '\UCSDMath\ErrorHandler\ErrorHandlerInterface',
            'class'          => '\UCSDMath\ErrorHandler\ErrorHandler',
            'object'         => null,
            'parameters'     => null
        ],
        'EventDispatcher'    => [
            'interface'      => '\Symfony\Component\EventDispatcher\EventDispatcher',
            'class'          => '\Symfony\Component\EventDispatcher\EventDispatcher',
            'object'         => null,
            'parameters'     => null
        ],
        'Filesystem'         => [
            'interface'      => '\UCSDMath\Filesystem\FilesystemInterface',
            'class'          => '\UCSDMath\Filesystem\Filesystem',
            'object'         => null,
            'parameters'     => null
        ],
        'Functions'          => [
            'interface'      => '\UCSDMath\Functions\FunctionsInterface',
            'class'          => '\UCSDMath\Functions\Functions',
            'object'         => null,
            'parameters'     => null
        ],
        'Html'               => [
            'interface'      => '\UCSDMath\Html\HtmlInterface',
            'class'          => '\UCSDMath\Html\Html',
            'object'         => null,
            'parameters'     => null
        ],
        'Image'              => [
            'interface'      => '\UCSDMath\Image\ImageInterface',
            'class'          => '\UCSDMath\Image\Image',
            'object'         => null,
            'parameters'     => null
        ],
        'Json'               => [
            'interface'      => '\UCSDMath\Serialization\Json\JsonInterface',
            'class'          => '\UCSDMath\Serialization\Json\Json',
            'object'         => null,
            'parameters'     => null
        ],
        'Logger'             => [
            'interface'      => '\UCSDMath\Log\Logger',
            'class'          => '\UCSDMath\Log\Logger',
            'object'         => null,
            'parameters'     => null
        ],
        'Mailer'             => [
            'interface'      => '\UCSDMath\Mailer\MailerInterface',
            'class'          => '\UCSDMath\Mailer\Mailer',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Swift_Mailer',
                                    'class' => 'Swift_Message',
                                    'class' => 'Swift_MailTransport',
                                ]
        ],
        'mPDF'               => [
            'interface'      => '\mPDF',
            'class'          => '\mPDF',
            'object'         => null,
            'parameters'     => [
                                    'string' => 'utf-8',
                                    'string' => 'Letter-L'
                                ]
        ],
        'Paginator'          => [
            'interface'      => '\UCSDMath\Pagination\PaginationInterface',
            'class'          => '\UCSDMath\Pagination\Paginator',
            'object'         => null,
            'parameters'     => null
        ],
        'Parser'             => [
            'interface'      => '\Symfony\Component\Yaml\Parser',
            'class'          => '\Symfony\Component\Yaml\Parser',
            'object'         => null,
            'parameters'     => null
        ],
        'Pdf'                => [
            'interface'      => '\UCSDMath\Pdf\PdfInterface',
            'class'          => '\UCSDMath\Pdf\Pdf',
            'object'         => null,
            'parameters'     => null
        ],
        'Persistence'        => [
            'interface'      => '\UCSDMath\Persistence\PersistenceInterface',
            'class'          => '\UCSDMath\Persistence\Persistence',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Request',
                                    'class' => 'Session',
                                    'class' => 'ConfigurationVault',
                                ]
        ],
        'Pithos'             => [
            'interface'      => '\UCSDMath\Pithos\PithosInterface',
            'class'          => '\UCSDMath\Pithos\Pithos',
            'object'         => null,
            'parameters'     => null

        ],
        'QuikReports'             => [
            'interface'      => '\UCSDMath\QuikReports\QuikReportsInterface',
            'class'          => '\UCSDMath\QuikReports\QuikReports',
            'object'         => null,
            'parameters'     => null
        ],
        'Request'            => [
            'interface'      => '\Symfony\Component\HttpFoundation\Request',
            'class'          => '\Symfony\Component\HttpFoundation\Request',
            'object'         => null,
            'parameters'     => null
        ],
        'Response'           => [
            'interface'      => '\Symfony\Component\HttpFoundation\Response',
            'class'          => '\Symfony\Component\HttpFoundation\Response',
            'object'         => null,
            'parameters'     => null
        ],
        'RouteCollection'    => [
            'interface'      => '\Symfony\Component\Routing\RouteCollection',
            'class'          => '\Symfony\Component\Routing\RouteCollection',
            'object'         => null,
            'parameters'     => null
        ],
        'Security'           => [
            'interface'      => '\UCSDMath\Security\SecurityInterface',
            'class'          => '\UCSDMath\Security\Security',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Database',
                                    'class' => 'Request',
                                ]
        ],
        'Session'            => [
            'interface'      => '\UCSDMath\Session\SessionInterface',
            'class'          => '\UCSDMath\Session\Session',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'SessionManager',
                                    'class' => 'Authentication',
                                    'class' => 'Encryption',
                                    'class' => 'Functions',
                                    'class' => 'Database',
                                    'class' => 'Request',
                                    'class' => 'dbh',
                                ]
        ],
        'SessionManager'     => [
            'interface'      => '\Symfony\Component\HttpFoundation\Session\SessionInterface as SessionManagerInterface',
            'class'          => '\Symfony\Component\HttpFoundation\Session\Session',
            'object'         => null,
            'parameters'     => null
        ],
        'Sftp'     => [
            'interface'      => '\UCSDMath\Sftp\SftpInterface',
            'class'          => '\UCSDMath\Sftp\Sftp',
            'object'         => null,
            'parameters'     => null
        ],
        'Swift_Mailer'       => [
            'interface'      => '\Swift_Mailer',
            'class'          => '\Swift_Mailer',
            'object'         => null,
            'parameters'     => null
        ],
        'Swift_Message'      => [
            'interface'      => '\Swift_Message',
            'class'          => '\Swift_Message',
            'object'         => null,
            'parameters'     => null
        ],
        'Swift_MailTransport' => [
            'interface'      => '\Swift_MailTransport',
            'class'          => '\Swift_MailTransport',
            'object'         => null,
            'parameters'     => null
        ],
        'TemplateFactory'    => [
            'interface'      => '\UCSDMath\TemplateFactory\TemplateFactoryInterface',
            'class'          => '\UCSDMath\TemplateFactory\TemplateFactory',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Database',
                                    'class' => 'Session',
                                    'class' => 'Config',
                                ]
        ],
        'Validation'         => [
            'interface'      => '\UCSDMath\Validation\ValidationInterface',
            'class'          => '\UCSDMath\Validation\Validation',
            'object'         => null,
            'parameters'     => null
        ],
        'ViewFactory'        => [
            'interface'      => '\UCSDMath\TemplateFactory\TemplateFactoryInterface',
            'class'          => '\UCSDMath\TemplateFactory\TemplateFactory',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Database',
                                    'class' => 'Session',
                                    'class' => 'Config',
                                ]
        ],
        'Xml'                => [
            'interface'      => '\UCSDMath\Serialization\Xml\XmlInterface',
            'class'          => '\UCSDMath\Serialization\Xml\Xml',
            'object'         => null,
            'parameters'     => null
        ],
        'Yaml'               => [
            'interface'      => '\UCSDMath\Serialization\Yaml\YamlInterface',
            'class'          => '\UCSDMath\Serialization\Yaml\Yaml',
            'object'         => null,
            'parameters'     => [
                                    'class' => 'Parser',
                                    'class' => 'Dumper',
                                ]
        ],
    ];

    // --------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @param ConfigurationInterface  $config  A ConfigurationInterface instance
     *
     * @api
     */
    public function __construct(ConfigurationInterface $config)
    {
        parent::__construct($config);
    }

    // --------------------------------------------------------------------------

    /**
     * Retrieve a stored element value
     *
     * @param string $key     The key name
     * @param string $section The element sub-element
     *
     * @return mixed The assigned value
     *
     * @throws \InvalidArgumentException if the key name is not defined
     *
     * @api
     */
    public function get($class, $section = 'object')
    {
        /**
         * Check Arguments
         */
        if (!$this->isStringKey($class, $this->{'storageRegister'})) {
            throw new \InvalidArgumentException(sprintf(
                'Required in "%s". Parameter %s must be type string and '.
                'exist in $this->{storageRegister}. Input was "%s". %s',
                'ServiceRequestContainer::get()',
                '{$class}',
                $class,
                '[x000945]'
            ));
        }

        if (!$this->{'storageRegister'}[$class][$section] instanceof $this->{'storageRegister'}[$class]['interface']) {
              $this->setRegister($class, $section, $this->newInstance($class));
        }

        return $this->{'storageRegister'}[$class][$section];
    }

    // --------------------------------------------------------------------------

    /**
     * New object instance.
     *
     * @param  string $interface A interface
     *
     * @return instance
     *
     * @throws \InvalidArgumentException if the interface name is not defined
     *
     * @api
     */
    protected function newInstance($interface)
    {
        switch ($interface) {
            case 'Application':
                return new \UCSDMath\Framework\Core\Application(
                    $this->get('RouteCollection'),
                    $this->get('EventDispatcher')
                );
                break;
            case 'Authentication':
                return new \UCSDMath\Authentication\Authentication(
                    $this->get('Database'),
                    $this->get('Encryption')
                );
                break;
            case 'Benchmark':
                return new \UCSDMath\Testing\Benchmark();
                break;
            case 'Config':
                return new Config();
                break;
            case 'ConfigurationVault':
                return new \UCSDMath\Configuration\ConfigurationVault\ConfigurationVault(
                    $this->get('Filesystem'),
                    $this->get('Yaml')
                );
                break;
            case 'Database':
                return new \UCSDMath\Database\Database(
                    $this->get('Request'),
                    $this->get('Functions'),
                    $this->get('ConfigurationVault')
                );
                break;
            case 'DateTime':
                return new \DateTime(null, $this->get('DateTimezone'));
                break;
            case 'DateTimezone':
                return new \DateTimezone(static::TIMEZONE);
                break;
            case 'Dumper':
                return new \Symfony\Component\Yaml\Dumper();
                break;
            case 'dbh':
                return $this->get('Database')->connect('webadmin');
                break;
            case 'Encryption':
                return new \UCSDMath\Encryption\Encryption($this->get('ConfigurationVault'));
                break;
            case 'ErrorHandler':
                return new \UCSDMath\ErrorHandler\ErrorHandler();
                break;
            case 'EventDispatcher':
                return new \Symfony\Component\EventDispatcher\EventDispatcher();
                break;
            case 'Filesystem':
                return new \UCSDMath\Filesystem\Filesystem();
                break;
            case 'Functions':
                return new \UCSDMath\Functions\Functions();
                break;
            case 'Hashids':
                return new \UCSDMath\Encryption\Hashids();
                break;
            case 'Html':
                return new \UCSDMath\Html\Html();
                break;
            case 'Image':
                return new \UCSDMath\Image\Image();
                break;
            case 'Json':
                return new \UCSDMath\Serialization\Json\Json();
                break;
            case 'Logger':
                return new \UCSDMath\Log\Logger();
                break;
            case 'Mailer':
                return new \UCSDMath\Mailer\Mailer(
                    $this->get('Swift_Mailer'),
                    $this->get('Swift_Message'),
                    $this->get('Swift_MailTransport')
                );
                break;
            case 'mPDF':
                return new \mPDF('utf-8', 'Letter-L');
                break;
            case 'Paginator':
                return new \UCSDMath\Pagination\Paginator(
                    $this->getClassParameters('Paginator', 'pageSettings')
                );
                break;
            case 'Parser':
                return new \Symfony\Component\Yaml\Parser();
                break;
            case 'Pdf':
                return new \UCSDMath\Pdf\Pdf();
                break;
            case 'Persistence':
                return new \UCSDMath\Persistence\Persistence(
                    $this->get('Request'),
                    $this->get('Session'),
                    $this->get('ConfigurationVault')
                );
                break;
            case 'Pithos':
                return new \UCSDMath\Pithos\Pithos();
                break;
            case 'QuikReports':
                return new \UCSDMath\QuikReports\QuikReports();
                break;
            case 'Request':
                return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
                break;
            case 'Response':
                return new \Symfony\Component\HttpFoundation\Response();
                break;
            case 'RouteCollection':
                return new \Symfony\Component\Routing\RouteCollection();
                break;
            case 'Security':
                return new \UCSDMath\Security\Security(
                    $this->get('Database'),
                    $this->get('Request')
                );
                break;
            case 'Session':
                return new \UCSDMath\Session\Session(
                    $this->get('SessionManager'),
                    $this->get('Authentication'),
                    $this->get('Encryption'),
                    $this->get('Functions'),
                    $this->get('Database'),
                    $this->get('Request'),
                    $this->get('dbh')
                );
                break;
            case 'SessionManager':
                return new \Symfony\Component\HttpFoundation\Session\Session();
                break;
            case 'Sftp':
                return new \UCSDMath\Sftp\Sftp();
                break;
            case 'TemplateFactory':
                return new \UCSDMath\TemplateFactory\TemplateFactory(
                    $this->get('Database'),
                    $this->get('Session'),
                    $this->get('Config')
                );
                break;
            case 'UUID':
                return new \UCSDMath\Encryption\UUID();
                break;
            case 'Validation':
                return new \UCSDMath\Validation\Validation();
                break;
            case 'ViewFactory':
                return new \UCSDMath\TemplateFactory\ViewFactory(
                    $this->get('Database'),
                    $this->get('Session'),
                    $this->get('Config')
                );
                break;
            case 'Xml':
                return new \UCSDMath\Serialization\Xml\Xml();
                break;

            case 'Yaml':
                return new \UCSDMath\Serialization\Yaml\Yaml(
                    $this->get('Parser'),
                    $this->get('Dumper')
                );
                break;

            default:
                throw new \InvalidArgumentException(sprintf(
                    'Required in "%s". Parameter %s must exist in class listing. Input was "%s". %s',
                    'ServiceRequestContainer::newInstance()',
                    '{$interface}',
                    $interface,
                    '[x000987]'
                ));
        }
    }
}
