<?php
class Bieding {
    private $veilingId;
    private $gebruikersnaam;
    private $biedingsTijd;
    private $biedingsBedrag;

    function __construct($veilingId) {
        $biedingen = executeQuery("SELECT * FROM biedingen WHERE veilingId = ?", [$veilingId]);

        if($biedingen["code"] == 0){
            $bieding = $biedingen["data"][0];

            $this->veilingId = $bieding["veilingId"];
            $this->gebruikersnaam = $bieding["gebruikersnaam"];
            $this->biedingsTijd = $bieding["biedingsTijd"];
            $this->biedingsBedrag = $bieding["biedingsBedrag"];

            $this->land = $bieding['land'];
            $this->provincie = $bieding['provincie'];
            $this->postcode = $bieding['postcode'];
            $this->plaatsnaam = $bieding['plaatsnaam'];
            $this->straatnaam = $bieding['straatnaam'];
            $this->huisnummer = $bieding['huisnummer'];
        }
    }

    public function toArray()
    {
        return [
            'veilingId' => $this->veilingId,
            'email' => $this->gebruikersnaam,
            'biedingsTijd' => $this->biedingsTijd,
            'biedingsBedrag' => $this->biedingsBedrag
        ];
    }

    private
    function update($column, $oldVal, $newVal)
    {
        executeQuery("UPDATE Categorie SET ? = ? WHERE ? = ?", [$column, $newVal, $column, $oldVal]);
    }

    /**
     * @return mixed
     */
    public function getVeilingId()
    {
        return $this->veilingId;
    }

    /**
     * @param mixed $veilingId
     */
    public function setVeilingId($veilingId)
    {
        $this::update("veilingId", $this->veilingId, $veilingId);
        $this->veilingId = $veilingId;
    }

    /**
     * @return mixed
     */
    public function getGebruikersnaam()
    {
        return $this->gebruikersnaam;
    }

    /**
     * @param mixed $email
     */
    public function setGebruikersnaam($gebruikersnaam)
    {
        $this::update("gebruikersnaam", $this->gebruikersnaam, $gebruikersnaam);
        $this->gebruikersnaam = $gebruikersnaam;
    }

    /**
     * @return mixed
     */
    public function getBiedingsTijd()
    {
        return $this->biedingsTijd;
    }

    /**
     * @param mixed $biedingsTijd
     */
    public function setBiedingsTijd($biedingsTijd)
    {
        $this::update("biedingsTijd", $this->biedingsTijd, $biedingsTijd);
        $this->biedingsTijd = $biedingsTijd;
    }

    /**
     * @return mixed
     */
    public function getBiedingsBedrag()
    {
        return $this->biedingsBedrag;
    }

    /**
     * @param mixed $biedingsBedrag
     */
    public function setBiedingsBedrag($biedingsBedrag)
    {
        $this::update("biedingsBedrag", $this->biedingsBedrag, $biedingsBedrag);
        $this->biedingsBedrag = $biedingsBedrag;
    }

}