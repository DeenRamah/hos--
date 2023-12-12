<?php

class EmergencyHospitalClock {

    private $temperature;
    private $systole;
    private $diastole;
    private $sugarLevel;
    private $bloodGroup;
    private $rhesusFactor;
    private $communicableDiseases;

    public function __construct($temperature, $systole, $diastole, $sugarLevel, $bloodGroup, $rhesusFactor, $communicableDiseases) {
        $this->temperature = $temperature;
        $this->systole = $systole;
        $this->diastole = $diastole;
        $this->sugarLevel = $sugarLevel;
        $this->bloodGroup = $bloodGroup;
        $this->rhesusFactor = $rhesusFactor;
        $this->communicableDiseases = $communicableDiseases;
    }

    public function monitor() {
        $intensity = 0;

        // Check temperature
        if ($this->temperature > 39.0) {
            $intensity += 3;
        }

        // Check blood pressure
        if ($this->systole > 180 || $this->diastole > 120) {
            $intensity += 5;
        }

        // Check sugar level
        if ($this->sugarLevel > 200) {
            $intensity += 2;
        }

        // Check blood group, rhesus factor, and communicable diseases
        if ($this->bloodGroup === 'O' && $this->rhesusFactor === '+') {
            $intensity += 1;
        }

        if (in_array('COVID-19', $this->communicableDiseases)) {
            $intensity += 4;
        }

        // Beep based on intensity
        $this->beep($intensity);
    }

    private function beep($intensity) {
        // Generate a beep sound or trigger an alert based on the intensity
        echo "Beep intensity: $intensity\n";
    }
}

// Example usage
$emergencyClock = new EmergencyHospitalClock(39.5, 170, 110, 250, 'O', '+', ['COVID-19', 'Influenza']);
$emergencyClock->monitor();


?>