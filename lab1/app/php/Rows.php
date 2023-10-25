<?php
class Row
{
    private $time;
    private $x;
    private $y;
    private $r;
    private $dataInfo;
    private $interval;

    public function __construct($time, $x, $y, $r, $dataInfo, $interval)
    {
        $this->time = $time;

        $this->x = $x;
        $this->y = $y;
        $this->r = $r;

        $this->dataInfo = $dataInfo;
        $this->interval = $interval;
    }
    
    public function getData(): string
    {
        return "
        <tr>
            <td>$this->time</td>
            <td>x = $this->x, y = $this->y, r = $this->r</td>
            <td>$this->dataInfo</td>
            <td>$this->interval</td>
        </tr>
        ";
    }
}

class Rows {
    private $MAX_SIZE_OF_ROWS = 10;
    private $rows = array();
    public function __construct($first_row) 
    {
        array_push($this->rows, $first_row);
    }
    public function pushFront($row)
    {
        if (count($this->rows) > $this->MAX_SIZE_OF_ROWS) {
            array_pop($this->rows);
        }
        array_unshift($this->rows, $row);
    }

    public function getValues() : array
    {   
        return $this->rows;
    }
    
}

function printRows($rows)
{
    foreach ($rows->getValues() as &$printingRow) {
        echo $printingRow->getData() . "\n";
    }
}