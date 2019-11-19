<?php
namespace KaufmannDigital\CookieConsent\Controller;

use Neos\Flow\Annotations as Flow;
use KaufmannDigital\CookieConsent\Domain\Model\Log;
use KaufmannDigital\CookieConsent\Domain\Repository\LogRepository;
use Neos\Flow\Mvc\Controller\RestController;
use Neos\Flow\Mvc\View\JsonView;

class LoggingController extends RestController {

    protected $viewObjectNamePattern = JsonView::class;


    /**
     * @Flow\Inject
     * @var LogRepository
     */
    protected $logRepository;


    /**
     * @param string $choice
     * @param int $cookieExpiryTimestamp
     */
    public function logAction(string $choice, int $cookieExpiryTimestamp)
    {
        $cookieExpiry = new \DateTime();
        $cookieExpiry->setTimestamp($cookieExpiryTimestamp);

        $log = new Log();
        $log->setDate(new \DateTime());
        $log->setChoice($choice);
        $log->setCookieExpiry($cookieExpiry);
        $log->setIpAddress($this->request->getHttpRequest()->getAttribute('clientIpAddress'));

        try {
            $this->logRepository->add($log);
            $this->response->setStatusCode(201);
        } catch (\Exception $e) {
            $this->response->setStatusCode(400);
        }

    }

}
