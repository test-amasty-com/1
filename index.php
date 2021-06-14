<?
interface IChessmen{
	public function move($x,$y);
    public function getPosition();
}
abstract class AbstractChessmen implements IChessmen{
	protected $x;
    protected $y;
    public function __construct($x,$y) {
		if($x>0 && $x<9)
			$this->x = $x;
		else $this->x = 1;
        if($y>0 && $y<9)
			$this->y = $y;
		else $this->y = 1;
    }
	public function getPosition()
    {
        echo 'X = '.$this->x.'  ';
        echo 'Y = '.$this->y;
    }
}
class King extends AbstractChessmen{
	public function Move($x,$y){
		if(abs($x-$this->x)<2 && $x>0 && $x<9)
			$tx = true;
		else 
			$tx = false;
		if(abs($y-$this->y)<2 && $y>0 && $y<9)
			$ty = true;
		else 
			$ty = false;
		if($tx && $ty){
			$this->x = $x;
			$this->y = $y;
		}else  throw new Exception('Сюда нельзя по правилам для King.');
	}
}
class Queen extends AbstractChessmen{
	public function Move($x,$y){
		$tx = false;
		$ty = false;
		if($x == $this->x && $y>0 && $y<9){
			$this->x = $x;
			$this->y = $y;
			return;
		}elseif($y == $this->y && $x>0 && $x<9){
			$this->x = $x;
			$this->y = $y;
			return;
		}elseif(abs($this->x-$x) == abs ($this->y-$y) & $x<9 & $y<9){
			$this->x = $x;
			$this->y = $y;
			return;
		}else throw new Exception('Сюда нельзя по правилам для Queen.');
	}
}
$queen = new Queen(1,1);
$king = new King(4,3);
//перемещаем Queen
try {
	$queen->Move(7,3);
}
catch(Exception $e){
	echo $e->getMessage()."<br>";
}
//перемещаем King
try {
	$king->Move(2,2);
}
catch(Exception $e){
	echo $e->getMessage()."<br>";
}
echo 'Позиция фигуры Queen ';
$queen->getPosition();
echo '<br>Позиция фигуры King: ';
$king->getPosition();
?>