<?php
/*
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\ExporterShopware6\Tests\Infrastructure\Model;

use Ergonode\ExporterShopware6\Infrastructure\Model\Shopware6CustomField;
use PHPUnit\Framework\TestCase;

/**
 */
class Shopware6CustomFieldTest extends TestCase
{
    /**
     * @var string|null
     */
    private string $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var array
     */
    private array $config;

    /**
     * @var string
     */
    private string $customFieldSetId;

    /**
     */
    protected function setUp(): void
    {
        $this->id = 'any_id';
        $this->name = 'any_name';
        $this->type = 'text';
        $this->config = [];
        $this->customFieldSetId = 'any_set_id';
    }

    /**
     */
    public function testCreateModel(): void
    {
        $model = new Shopware6CustomField($this->id, $this->name, $this->type, $this->config, $this->customFieldSetId);

        self::assertEquals($this->id, $model->getId());
        self::assertEquals($this->name, $model->getName());
        self::assertEquals($this->type, $model->getType());
        self::assertEquals($this->config, $model->getConfig());
        self::assertEquals($this->customFieldSetId, $model->getCustomFieldSetId());

        self::assertIsArray($model->getConfig());
        self::assertNotTrue($model->isModified());
    }

    /**
     */
    public function testSetModel(): void
    {
        $model = new Shopware6CustomField();

        $model->setName($this->name);
        $model->setType($this->type);
        $model->setCustomFieldSetId($this->customFieldSetId);

        self::assertEquals($this->name, $model->getName());
        self::assertEquals($this->type, $model->getType());
        self::assertEquals($this->config, $model->getConfig());
        self::assertEquals($this->customFieldSetId, $model->getCustomFieldSetId());

        self::assertIsArray($model->getConfig());
        self::assertTrue($model->isModified());
    }
}
