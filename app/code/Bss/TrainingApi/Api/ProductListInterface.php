<?php
declare(strict_types=1);

namespace Bss\TrainingApi\Api;

interface ProductListInterface
{
    /**
     * Get list of products by category ID
     *
     * @param int $categoryId
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
    public function getProductList(int $categoryId): array;
}
