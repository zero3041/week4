<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;

/**
 * Controller returning JSON response with request parameters.
 */
class InfoJson implements HttpGetActionInterface
{
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * Constructor.
     *
     * @param RequestInterface $request
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        RequestInterface $request,
        JsonFactory $resultJsonFactory
    ) {
        $this->request = $request;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * Execute the action and return JSON response.
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $jsonData = $this->request->getParams();
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($jsonData);
    }
}
