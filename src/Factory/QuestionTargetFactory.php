<?php

namespace App\Factory;

use App\Entity\QuestionTarget;
use App\Repository\QuestionTargetRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<QuestionTarget>
 *
 * @method static QuestionTarget|Proxy createOne(array $attributes = [])
 * @method static QuestionTarget[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static QuestionTarget|Proxy find(object|array|mixed $criteria)
 * @method static QuestionTarget|Proxy findOrCreate(array $attributes)
 * @method static QuestionTarget|Proxy first(string $sortedField = 'id')
 * @method static QuestionTarget|Proxy last(string $sortedField = 'id')
 * @method static QuestionTarget|Proxy random(array $attributes = [])
 * @method static QuestionTarget|Proxy randomOrCreate(array $attributes = [])
 * @method static QuestionTarget[]|Proxy[] all()
 * @method static QuestionTarget[]|Proxy[] findBy(array $attributes)
 * @method static QuestionTarget[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static QuestionTarget[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static QuestionTargetRepository|RepositoryProxy repository()
 * @method QuestionTarget|Proxy create(array|callable $attributes = [])
 */
final class QuestionTargetFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'clientType' => self::faker()->text(10,20),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(QuestionTarget $questionTarget): void {})
        ;
    }

    protected static function getClass(): string
    {
        return QuestionTarget::class;
    }
}
