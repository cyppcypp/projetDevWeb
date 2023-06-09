<link rel="stylesheet" href="style/main.css">

<?php

class Room {
    private string $name;
    private string $description;
    private string $type;
    private int $donjon_id;
    private int $or;
    private int $force;

    public function __construct($room)
    {
        $this->name = $room['name'];
        $this->description = $room['description'];
        $this->type = $room['type'];
        $this->donjon_id = $room['donjon_id'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getHTML(): string
    {
        $html = "";

        switch ($this->type) {
            case 'vide':
                $html .= "<p class='mt-4'><a href='donjons.play.php?id=". $this->donjon_id ."'class='btnplay'>Continuer l'exploration</a></p>";
                break;

            case 'treasur':
                $html .= "<p class='mt-4'>Vous avez gagné " . $this->or . " pièce d'or</p>";
                $html .= "<p class='mt-4'><a href='donjons.play.php?id=". $this->donjon_id ."' class='btnplay'>Continuer l'exploration</a></p>";
                break;

            case 'combat':
                $html .= "<p class='mt-4'><a href='donjon.fight.php?id=". $this->donjon_id ."' class='btnplay'>Combattre</a>";
                $html .= "<a href='donjons.play.php?id=". $this->donjon_id ."' class='btnplay'>Fuir et continuer l'exploration</a></p>";
                break;

            case 'marchand':
                $html .= "<p class='mt-4'><a href='marchand.php?id=". $this->donjon_id ."' class='btnplay'>Parler au marchand</a>";
                $html .= "<a href='donjons.play.php?id=". $this->donjon_id ."' class='btnplay'>Continuer l'exploration</a></p>";
                break;
 
            
            default:
                $html .= "<p>Aucune action possible !</p>";
                break;
        }

        return $html;
    }

    public function makeAction(): void
    {
        switch ($this->type) {
            case 'vide':
                break;

            case 'treasur':
                $this->or = rand(0, 20);
                $_SESSION['perso']['gold'] += $this->or;
                break;

            case 'combat':
                break;
            
            default:
                break;
        }

    }

}