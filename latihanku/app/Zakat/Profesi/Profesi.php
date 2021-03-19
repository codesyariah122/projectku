<?php
//koding kala weekend
/*
             ****
             simple
      autoloader namespace
           inheritance
             *****
pujiermanto(codesyariah - 2019)
*/
//   Yuk Bayar Zakat

namespace app\Zakat\Profesi;

class Profesi extends \app\BaseClass\BaseClass{

  private static $qiyas=653,
                 $gabah=5000,
                 $kadar=2.5;
  private $nisab;
  protected $penghasilan,
            $pengeluaran,
            $bersih;

//Setup Zakat
  public function setZakat($incm,$spnd){

    $this->penghasilan=$incm;
    $this->pengeluaran=$spnd;

    define("Q",self::$qiyas);
    define("GBH",self::$gabah);
    define("KDR",self::$kadar);

    $this->nisab=Q * GBH;
  }

//Go it
  public function getZakat(){

    $this->bersih=
      ($this->penghasilan - $this->pengeluaran);
      // echo "<h1>{$this->bersih}</h1>";

      if($this->bersih === 0):
          echo "
          <fieldset>
             <h2>Maaf anda belum mengisi ketentuan yang diharapkan mesin penghitungan kami.<br><span class='hasil'>Method Error</span>
            </h2>
          </fieldset>
          ";

      elseif($this->bersih <= $this->nisab):

        echo "
        <fieldset>
        <h1>Hitung Zakat </h1>
        <h2>
            Penghasilan : <span class='hasil'> Rp. ".number_format($this->penghasilan)."</span>
        <br>

            pengeluaran :
            <span class='hasil'>
        Rp. ".number_format($this->pengeluaran)."
        </span>
        <br>

            nisab :
        <span class='hasil'>
        Rp.".number_format($this->nisab)."
        </span>
        <br>

            kadar zakat :
        <span class='persen'>".KDR."%
        </span>
        <br>
        ";

        echo "Asset anda tidak masuk dalam penghitungan nisab <br><span class='hasil'>Bebas Zakat</span>
        </h2>
        </fieldset>
        ";

      elseif($this->bersih >= $this->nisab):

          $this->result=
            (($this->bersih * KDR)/100);

          echo "
              <fieldset>
              <h1>Ayo Bayar Zakat</h1>
              <h2>
              Penghasilan :
              <span class='hasil'>Rp. ".
          number_format($this->penghasilan)."</span>
          <br>

              pengeluaran :
              <span class='hasil'>Rp. ".
          number_format($this->pengeluaran)."</span>
          <br>

              nisab :
              <span class='hasil'>Rp. ".
          number_format($this->nisab)."</span>
          <br>

              kadar zakat :
              <span class='persen'>".KDR."% </span>
          <br>

              Total Zakat : <span class='hasil'>Rp. ".
          number_format($this->result)."</span>
          </h2>
          </fieldset>
          <br><br>
          ";

      endif;

  }

}