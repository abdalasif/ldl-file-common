<?php declare(strict_types=1);

namespace LDL\FS\File\Collection;

use LDL\FS\File\Collection\Validator\FileExistsValidator;
use LDL\FS\File\Collection\Validator\ReadableFileValidator;
use LDL\Type\Collection\Types\Object\ObjectCollection;
use LDL\Type\Collection\Types\Object\Validator\ClassComplianceItemValidator;

final class ReadableFileCollection extends ObjectCollection
{

    public function __construct(iterable $items = null)
    {
        parent::__construct($items);

        $this->getValidatorChain()
            ->append(new ClassComplianceItemValidator(\SplFileInfo::class))
            ->append(new FileExistsValidator())
            ->append(new ReadableFileValidator())
            ->lock();
    }

}