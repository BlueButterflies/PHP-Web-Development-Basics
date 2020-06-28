<?php
class Pokemon
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $element;

    /**
     * @var int
     */
    private $health;

    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    /**
     * @return string
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }

    public function hit(int $dmg): void
    {
        $this->health -= max(0, $dmg);
    }
}

class Trainer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $badges;

    /**
     * @var Pokemon[][]
     */
    private $pokemons;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->badges = 0;
        $this->pokemons = [];
    }

    /**
     * @return int
     */
    public function getBadges(): int
    {
        return $this->badges;
    }

    public function catchPokemon(Pokemon $pokemon): void
    {
        $this->pokemons[$pokemon->getElement()][] = $pokemon;
    }

    public function receiveBadge(): void
    {
        $this->badges++;
    }

    public function hadPokemonsByElement(string $element):bool
    {
        return key_exists($element, $this->pokemons) && count($this->pokemons[$element]) > 0;
    }

    public function hitPokemons(int $dmg): void
    {
        foreach ($this->pokemons as $type => $pokemonsByType) {
            foreach ($pokemonsByType as $key => $pokemon) {
                $pokemon->hit($dmg);

                if (!$pokemon->isAlive()) {
                    unset($this->pokemons[$type][$key]);
                }
            }
        }
    }

    public function __toString(): string
    {
        $count = 0;
        foreach ($this->pokemons as $pokemon) {
            $count += count($pokemon);
        }

        return $this->name . " " . $this->badges . ' ' . $count;
    }

}

/**
 * @var Trainer[] $trainers
 */
$trainers = [];

$input = readline();

while ($input !== 'Tournament') {
    list($trainerName, $pokemonName, $pokemonElement, $pokemonHealth) = explode(" ", $input);

    if (!key_exists($trainerName, $trainers)) {
        $trainers[$trainerName] = new Trainer($trainerName);
    }
    $trainerName = $trainers[$trainerName];
    $trainerName->catchPokemon(new Pokemon($pokemonName, $pokemonElement, $pokemonHealth));

    $input = readline();
}

$input = readline();

while ($input !== "End") {
    foreach ($trainers as $trainerName) {
        if ($trainerName->hadPokemonsByElement($input)){
            $trainerName->receiveBadge();
        }
        else {
            $trainerName->hitPokemons(10);
        }
    }

    $input = readline();
}

uksort($trainers, function ($key1, $key2) use ($trainers) {
    $trainer1 = $trainers[$key1];
    $trainer2 = $trainers[$key2];

    return $trainer2->getBadges() <=> $trainer1->getBadges();
});

echo implode(PHP_EOL, $trainers);