<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;

/**
 * Class InfoForward
 * Forwards HomePage
 */
class InfoForward implements HttpGetActionInterface
{
    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var Context
     */
    protected $context;

    /**
     * InfoForward constructor.
     *
     * @param Context $context
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        $this->context = $context;
        $this->resultForwardFactory = $resultForwardFactory;
    }

    /**
     * Execute action
     *
     * @return \Magento\Framework\Controller\Result\Forward
     */
    public function execute()
    {
        $result = $this->resultForwardFactory->create();
        $result->setModule('cms');
        $result->setController('index');
        $result->forward('index');

        return $result;
    }
}
