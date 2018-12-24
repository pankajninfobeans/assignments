<?php
namespace Electronics;
    
interface Command {
    public function operation($command);
}
    
class TvRemote implements Command {
    private $flag;
    private $tvObject;
    
    /**
     * Constructor to get relationship with TV
     */
    public function __construct($tvObject) {
        $this->tvObject = $tvObject;
    }
    /**
     * Purpose of this function is to perform various TV operations
     */
    public function operation($command) {
        switch($command) {
            case "up":
                $this->tvObject->volumeUp();
                break;
            case "down":
                $this->tvObject->volumeDown();
                break;
            case "on":
                $this->tvObject->on();
                break;
            case "off":
                $this->tvObject->off();
                break;
            case "next":
                $this->tvObject->next();
                break;
            case "prev":
                $this->tvObject->prev();
                break;
            default:
                echo "Nothing";
                break;
        }        
    }
}
?>
