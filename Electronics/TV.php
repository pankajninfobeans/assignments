<?php
namespace Electronics;

class TV {
    private $company, $model, $screenSize, $type, $status;
    private $channel = 1;
    private $volume = 1;
    const Min = 0;
    const Max = 100;

    public function __construct($company, $model, $screenSize, $type) {
        $this->company = $company;
        $this->model = $model;
        $this->screenSize = $screenSize;
        $this->type = $type;
    }

    /**
     * This function will return the status of TV on/off
     */
    function getStatus() {
        return $this->status;
    }

    /**
     * This function will turn on the tv
     */
    public function on() {

        $this->status = "on";

    }

    /**
     * This function will turn off the tv
     */
    public function off() {
        $this->status = "off";

    }

    /**
     * This function will increase the volume of TV
     */
    public function volumeUp() {
        if ($this->volume < self::Max) {
            $this->volume++;
        }

    }
    /**
     * This function will return the current volume
     * 
     * @return integer volume
     */
    public function getVolume() {
        return $this->volume;
    }

    /**
     * This function will decrease the volume of TV
     */
    public function volumeDown() {
        if ($this->volume >= self::Min && $this->volume < self::Max) {
            $this->volume--;
        }
    }

    /**
     * This function will change the channel to next  
     * 
     */
    public function next() {
        if ($this->channel < self::Max) {
            $this->channel++;
        }
    }
    /**
     * This function will change the channel to next  
     * 
     */
    public function prev() {
        if ($this->channel < self::Max && $this->channel >= self::Min) {
            $this->channel--;
        }
    }
    /**
     * This function will return the channel number
     */
    public function getChannel() {
        return $this->channel;
    }
}
?>

