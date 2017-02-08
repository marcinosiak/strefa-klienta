<?php

  class Offer {

    private $zdjeciaPortretowe = array('10x15' => 6, '13x18' => 7, '15x21' => 8, '20x30' => 11);
    private $kartkaSwiateczna = array('10x15' => 7);
    private $zestawKartek = array('10x15' => 30);
    private $zdjecieDoPortfela = array('3.5x4.5' => 10);
    private $zdjecieGrupowe = array('15x21' => 8, '20x30' => 10);
    private $zdjeciaWmagnesie = array('5x7.5' => 6, '6x9' => 7, '10x15' => 11, '15x21' => 16);
    private $obrazNaPlotnie = array('30x40' => 40, '40x60' => 55, '50x70' => 65, '60x90' => 85);

    public function __call($name, $params)
		{
			if($params[0] == "ZdjeciaPortretowe") {
				return $this->getZdjeciaPortretowe();
			}
      elseif ($params[0] == "KartkaSwiateczna") {
        return $this->getKartkaSwiateczna();
      }
      elseif ($params[0] == "ZestawKartek") {
        return $this->getZestawKartek();
      }
      elseif ($params[0] == "ZdjecieDoPortfela") {
        return $this->getZdjecieDoPortfela();
      }
      elseif ($params[0] == "ZdjecieGrupowe") {
        return $this->getZdjecieGrupowe();
      }
      elseif ($params[0] == "ZdjeciaWmagnesie") {
        return $this->getZdjeciaWmagnesie();
      }
      elseif ($params[0] == "ObrazNaPlotnie") {
        return $this->getObrazNaPlotnie();
      }
      else {
        //error_log("Nie ma takiej metody ('. $name .') w klasie Offer");
        echo ("Nie ma takiej metody $name() w klasie Offer");
        return false;
      }
		}

    public function getZdjeciaPortretowe()
    {
      return $this->zdjeciaPortretowe;
    }

    public function getKartkaSwiateczna()
    {
      return $this->kartkaSwiateczna;
    }

    public function getZestawKartek()
    {
      return $this->zestawKartek;
    }

    public function getZdjecieDoPortfela()
    {
      return $this->zdjecieDoPortfela;
    }

    public function getZdjecieGrupowe()
    {
      return $this->zdjecieGrupowe;
    }

    public function getZdjeciaWmagnesie()
    {
      return $this->zdjeciaWmagnesie;
    }

    public function getObrazNaPlotnie()
    {
      return $this->obrazNaPlotnie;
    }
  }

?>
