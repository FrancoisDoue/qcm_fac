<?php
/**
* @class Form
* Permet de générer un formulaire rapidement et simplemement
*/
class Form{
    /**
     * @var array données utilisées par le form
     */
    private array $data;

    /**
     * @var string variable utilisé pour la balise entourant les champs
     */
    public string $surround = 'p';

    /**
     * @param array utilisées par le form
     */
    public function __construct(array $data = array())
    {
        $this->data = $data;
    }

    /**
     * @param string servira à vérifier que l'index de data existe
     * @return string/null retournera l'élément de data ou null
     */
    private function getValue(string $index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @param $html code html à retourner
     * @return string entouré de balise correspondant à $surround
     */
    private function surround(string $html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }
    /**
     * @param string $name met le name="" désiré dans l'input
     * @param string $type défault 'text' le type de l'input
     * @return string l'input entouré de ses balises (défaut <p>)
     */
    public function input(string $name, string $type = 'text')
    {
        return $this->surround(
            '<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'" />'
        );
    }
    public function label(string $name, string $html = 'default Label')
    {
        return $this->surround(
            '<label for="'.$name.'">'.$html.' :</label>'
        );
    }
    /**
     * @param string sert à personnaliser le texte du submit (défaut 'Envoyer')
     * @return string bouton submit
     */
    public function submit(string $html = 'Envoyer')
    {
        return $this->surround('<button type="submit">'.$html.'</button>');
    }
}