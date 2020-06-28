<?php
interface ICall{
    public function call(string $number): string ;
}

interface IBrowsable{
    public function browser(string $web) : string ;
}

class Smartphone implements ICall,IBrowsable
{
    /**
     * @param string $number
     * @return string
     * @throws Exception
     */
    public function call(string $number):string
    {
        if (!is_numeric($number)){
            throw new Exception("Invalid number!");
        }

        return "Calling... {$number}".PHP_EOL;
    }

    /**
     * @param string $web
     * @return string
     * @throws Exception
     */
    public function browser(string $web):string
    {
        if (preg_match("/[0-9]+/", $web))
        {
            throw new Exception("Invalid URL!");
        }

        return "Browsing: {$web}!".PHP_EOL;
    }
}

$numbers = explode(" ", readline());
$site = explode(" ", readline());

$smartphone = new Smartphone();

foreach ($numbers as $num){
    try {
        echo $smartphone->call($num);
    } catch (Exception $e) {
        echo $e->getMessage().PHP_EOL;
    }
}

foreach ($site as $web){
    try {
        echo $smartphone->browser($web);
    } catch (Exception $e) {
        echo $e->getMessage().PHP_EOL;
    }
}
