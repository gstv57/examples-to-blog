<?php

class BasicType
{
    public string $name = "Gustavo";
    public float $price = 100.00;
    public bool $status = false;
    public int $id = 0;

    public function getString(): string
    {
        return $this->name;
    }

    public function getFloat(): float
    {
        return $this->price;
    }

    public function getBool(): bool
    {
        return $this->status;
    }

    public function getInt(): int
    {
        return $this->id;
    }
}

class CompoundType
{

    /** @var array<int> */
    private array $numbersIntegers = [];

    /** @var array<string, mixed> */
    private array $dataMixed = [];

    public function processNumbers(array $numbers): array
    {
        return array_map(fn($n) => $n * 2, $numbers);
    }
}

class TypesAdvanced {
    // Union Types
    function processData(int|float $value): string|bool {
        if ($value > 0) {
            return "Positive"; // return string
        }
        return false; // return bool
    }

    // Nullable Types
    function findUser(?int $id): ?array {
        if ($id === null) {
            return null; // return null
        }
        return ['id' => $id, 'nome' => 'Usuário']; // return array
    }
}

## Interfaces and CustomTypes
interface Payable {
    public function calculateTotal(): float; // required implementation a return float
}

class Product implements Payable {
    public function __construct(
        private string $name,
        private float $price
    ) {}

    public function calculateTotal(): float {
        return $this->price;
    }
}



/**
 * @template T
 */
class Collection {
    /** @var array<T> */
    private array $items = [];
    
    /**
     * @param T $item
     */
    public function add($item): void {
        $this->items[] = $item;
    }
    
    /**
     * @return array<T>
     */
    public function all(): array {
        return $this->items;
    }
}


## Types Intersection (PHP 8.1+)

interface Identifiable {
    public function getId(): int;
}

interface Nameable {
    public function getName(): string;
}


## Use types intersection in arguments
function processEntity(Identifiable&Nameable $entity): void {
    echo "ID: " . $entity->getId();
    echo "Name: " . $entity->getName();
}

class User {
    public function __construct(
        public readonly string $name,
        public readonly string $email
    ) {}
}


## Enums

enum StatusInvoice: string {
    case PEDING = 'peding';
    case APPROVED = 'approved';
    case REJECT = 'reject';
}

class Invoice {
    public function __construct(
        private StatusInvoice $status
    ) {}
    
    public function getStatus(): StatusInvoice {
        return $this->status;
    }
}