<?php 
class Page_Data {
    private string $title = "" ;
    private string $content = "" ;
    private string $css = "" ; 
    private string $embeddedStyle = "" ;
    private string $footer = "";
    private string $script = "";

    // get methods
    public function getTitle() : string {
        return $this->title ;
    }
    public function getContent() : string{
        return $this->content ;
    }
    public function getCSS() : string{
        return $this->css ;
    }
    public function getEmbeddedStyle() :string{
        return $this->embeddedStyle ;
    }
    public function getFooter() : string {
        return $this->footer ;
    }
    public function getScript(): string
    {
        return $this->script;
    }

    // set methods
    public function setTitle(string $val){
        $this->title = $val ;
    }

    public function setContent(string $val){
        $this->content = $val ;
    }
    public function appendContent(string $val){
        $this->content .= $val ;
    }

    public function setCSS(string $val){
        $this->css = $val ;
    } 
    public function appendCSS(string $val){
        $this->css .= $val ;
    }

    public function setEmbeddedStyle(string $val){
        $this->embeddedStyle = $val ;
    } 
    public function appendEmbeddedStyle(string $val){
        $this->embeddedStyle .= $val ;
    }
    public function setFooter(string $val){
        $this->footer = $val ;
    } 

    
    public function setScript(string $value)
    {
        $this->script = $value;
    }
    public function appendScript(string $value)
    {
        $this->script .= $value;
    }


}

