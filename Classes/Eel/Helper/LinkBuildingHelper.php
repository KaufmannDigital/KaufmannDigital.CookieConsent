<?php

namespace KaufmannDigital\CookieConsent\Eel\Helper;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\ContentRepository\Domain\Model\NodeType;
use Neos\ContentRepository\Domain\Service\ContextFactoryInterface;
use Neos\ContentRepository\Domain\Service\NodeTypeManager;
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Http\Request;
use Neos\Flow\Mvc\ActionRequest;
use Neos\Flow\Mvc\Routing\UriBuilder;
use Neos\Neos\Service\LinkingService;


/**
 * Class LinkBuilderHelper
 * @package KaufmannDigital\Neos\Base\Eel\Helper
 * @author Niklas Droste <nd@kaufmann.digital>
 */
class LinkBuildingHelper implements ProtectedContextAwareInterface
{

    /**
     * @Flow\Inject
     * @var ContextFactoryInterface
     */
    protected $contextFactory;


    /**
     * @Flow\Inject
     * @var UriBuilder
     */
    protected $uriBuilder;


    /**
     * @param string $nodeIdentifier
     * @param string $workspace
     * @return string
     * @throws \Neos\Flow\Mvc\Routing\Exception\MissingActionNameException
     */
    public function fromNodeIdentifier(string $nodeIdentifier, string $workspace = 'live'): string
    {
        $context = $this->contextFactory->create(['workspace' => $workspace]);
        $node = $context->getNodeByIdentifier($nodeIdentifier);

        //End here, if node does not exist
        if (!$node instanceof NodeInterface) {
            return '';
        }

        $httpRequest = Request::createFromEnvironment();
        $actionRequest = new ActionRequest($httpRequest);
        $this->uriBuilder->setRequest($actionRequest);

        return $this->uriBuilder
            ->reset()
            ->setCreateAbsoluteUri(true)
            ->uriFor('show', ['node' => $node], 'Frontend\Node', 'Neos.Neos');
    }

    public function allowsCallOfMethod($methodName)
    {
        return true;
    }

}
