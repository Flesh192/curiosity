<?php

namespace Tests\Feature\Service;

use App\Gateway\CuriositystreamCategoriesGateway;
use App\Service\CategoryService;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * Class CategoryServiceTest
 * @package Tests\Service
 */
class CategoryServiceTest extends TestCase
{

    /**
     * @var CuriositystreamCategoriesGateway
     */
    private CuriositystreamCategoriesGateway $apiClient;

    /**
     * @var MockHandler
     */
    private MockHandler $mockHandler;

    private CategoryService $categoryService;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();

        $httpClient = new Client([
            'handler' => $this->mockHandler,
        ]);

        $this->apiClient = new CuriositystreamCategoriesGateway($httpClient);
        $this->categoryService = new CategoryService($this->apiClient);
    }

    public function test_get_categories()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/fixtures/categories.json')));

        $categories = $this->categoryService->getCategories();

        $this->assertCount(7, $categories);
        $this->assertCount(9, $categories[0]->getSubcategories());
    }

    public function test_getters_categories()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/fixtures/categories.json')));

        $categories = $this->categoryService->getCategories();

        $this->assertEquals('science', $categories[0]->getName());
        $this->assertEquals('Science', $categories[0]->getLabel());
        $this->assertEquals('Rise and Fall of T-Rex', $categories[0]->getImageLabel());
        $this->assertEquals('https://cdn.curiositystream.com/system/Category/images/000/000/001/medium/Science-T-Rex-460x460.jpg', $categories[0]->getImageUrl());
        $this->assertEquals('https://cdn.curiositystream.com/system/Category/headers/000/000/001/medium/Science-1440x340.jpg', $categories[0]->getHeaderUrl());
        $this->assertEquals('https://cdn.curiositystream.com/system/Category/backgrounds/000/000/001/medium/Science-1920x1080.jpg', $categories[0]->getBackgroundUrl());
        $this->assertTrue($categories[0]->hasSubcategories());
        $this->assertIsArray($categories[0]->getSubcategories());
    }
}
