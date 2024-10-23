## Basic Scalar Types and Strict Typing

```php
// Int
$old: int = 25;

// Float
$price: float = 99.99;

// String
$name: string = "João";

// Boolean
$active: bool = true;
```

## Compound Types

```php

// Arrays Typing
function processNumbers(array $numbers): array {
    return array_map(fn($n) => $n * 2, $numbers);
}

class Example {
    /** @var array<int> */
    private array $numbersIntegers = [];
    # it should return one array with numbers integers; [1,2,3,4..];
    
    /** @var array<string, mixed> */
    private array $dataMixed = [];
    # it should return one array with data mixed; [1, "2", true, "four"..]
}
```


## Types Return Advanced

```php

// Union Types (PHP 8.0+)
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


```

## Interfaces and CustomTypes

```php

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

```

## TypeGenerics(with DocBlocks)

```php

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

```





## Types Intersection (PHP 8.1+)

```php

interface Identifiable {
    public function getId(): int;
}

interface Nameable {
    public function getName(): string;
}

// Use types intersection in arguments
function processEntity(Identifiable&Nameable $entity): void {
    echo "ID: " . $entity->getId();
    echo "Name: " . $entity->getName();
}

```

## Readonly Properties (PHP 8.1+)

```php

class User {
    public function __construct(
        public readonly string $name,
        public readonly string $email
    ) {}
}

```

## Enums (PHP 8.1+)

```php

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

```