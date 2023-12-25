<?php

namespace Console\Support\Console;

class Console
{
    private string $TextColor = "";

    private string $BgColor = "";

    private string $Text = '';

    private string $WrittenText = '';

    public function TextColor(string $Color)
    {
        $Color = strtolower($Color);
        switch ($Color)
        {
            case ('black'):
                $this->TextColor = "\e[30m";
                break;

            case ('red'):
                $this->TextColor = "\e[31m";
                break;

            case ('green'):
                $this->TextColor = "\e[32m";
                break;

            case ('yellow'):
                $this->TextColor = "\e[33m";
                break;

            case ('blue'):
                $this->TextColor = "\e[34m";
                break;

            case ('magenta'):
                $this->TextColor = "\e[35m";
                break;

            case ('cyan'):
                $this->TextColor = "\e[36m";
                break;

            default:
                $this->TextColor = "\e[39m";
                break;
        }
        return $this;
    }

    public function BgColor(string $Color)
    {
        $Color = strtolower($Color);
        switch ($Color)
        {
            case ('black'):
                $this->BgColor = "\e[40m";
                break;

            case ('red'):
                $this->BgColor = "\e[41m";
                break;

            case ('green'):
                $this->BgColor = "\e[42m";
                break;

            case ('yellow'):
                $this->BgColor = "\e[43m";
                break;

            case ('blue'):
                $this->BgColor = "\e[44m";
                break;

            case ('magenta'):
                $this->BgColor = "\e[45m";
                break;

            case ('cyan'):
                $this->BgColor = "\e[46m";
                break;

            default:
                $this->BgColor = "\e[49m";
                break;
        }
        return $this;
    }

    public function Text(string $Text)
    {
        $this->Text = $Text;

        return $this;
    }

    public function Next()
    {
        $this->WrittenText = $this->WrittenText . $this->TextColor . $this->BgColor . $this->Text . "\e[39m\e[49m";

        $this->BgColor = "\e[49m";

        $this->TextColor = "\e[39m";

        $this->Text = '';

        return $this;
    }

    public function Write()
    {
        $this->Build();

        print_r($this->Text);
    }



    public function WriteSpace()
    {
        $this->Build();

        print_r("\n\r $this->Text \n\n\r\r ");
    }

    public function WriteLn()
    {
        $this->Build();

        print_r("$this->Text \n\n\r\r ");
    }



    private function Build()
    {
        if ($this->WrittenText == '')
        {
            $this->Text = $this->TextColor . $this->BgColor . $this->Text . "\e[39m\e[49m";
        }
        else
        {
            $this->Text = $this->WrittenText . $this->TextColor . $this->BgColor . $this->Text . "\e[39m\e[49m";
        }
    }
}
