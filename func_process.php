<?php
    class WP {

        public function bobot($bobot)
        {
            $mBobot = array();

            for ($i = 0; $i < count($bobot); $i++) {
                $val = $bobot[$i] / array_sum($bobot);
                $mBobot[] = $val;
            }

            return $mBobot;
        }

        public function vektor($nilai, $gBobot)
        {

            $hitung = 0;
            for ($i=0; $i < count($nilai) ; $i++) { 
                if ($hitung == 0)
                    $hitung = pow($nilai[$i], $gBobot[$i]);
                else
                    $hitung = $hitung * pow($nilai[$i], $gBobot[$i]);

                $hitung = $hitung;
            }

            return $hitung;
        }

        function ranking($vector, $sumVector)
        {
            $nilai = $vector / $sumVector;
            return $nilai;
        }
    }
?>