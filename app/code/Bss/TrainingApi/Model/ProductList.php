<?php
declare(strict_types=1);

namespace Bss\TrainingApi\Model;

use Bss\TrainingApi\Api\ProductListInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class ProductList
 *
 * This class is responsible for retrieving a list of products based on category ID.
 */
class ProductList implements ProductListInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     *
     * @param int $categoryId
     * @return array
     */
    public function getProductList(int $categoryId): array
    {
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('category_id', $categoryId)
            ->setPageSize(5)
            ->create();

        $products = $this->productRepository->getList($searchCriteria)->getItems();
        $result = [];

        foreach ($products as $product) {
            $result[] = [
                'id' => $product->getId(),
                'sku' => $product->getSku(),
                'name' => $product->getName(),
            ];
        }

        return $result;
    }
}
