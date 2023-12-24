<?php

namespace Console\Support\Console;

class Color
{
    private string $TextColor = "\e[39m";

    private string $BgColor = "\e[49m";

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
        if ($this->WrittenText == '')
        {
            $Text = $this->TextColor . $this->BgColor . $this->Text . "\e[39m\e[49m";
        }
        else
        {
            $Text = $this->WrittenText . $this->TextColor . $this->BgColor . $this->Text . "\e[39m\e[49m";
        }

        print_r($Text);
    }
}
