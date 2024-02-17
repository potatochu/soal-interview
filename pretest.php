<?php
function cetakAngka() {
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "TigaLima \n";
        } elseif ($i % 3 == 0) {
            echo "Tiga \n";
        } elseif ($i % 5 == 0) {
            echo "Lima \n";
        } else {
            echo $i . "\n";
        }
    }
}

cetakAngka();
