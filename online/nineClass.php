<?php
/**
  ** @brief PHP class for the ninerBoard, which is an HTML populator
	** @pre none
	** @post HTML gets populated
	** @return None
  */
  class ninerBoard {

    private $user1 = "";
    private $user2 = "";
    private $gameID;
    private $tiles = array(); // $tiles is the 81 X/Os
    private $size;
    private $lastMove;


    public function __construct($user1, $user2, $sequencedMoves, $gameID) //$sequencedMoves is list of moves (value 0-80) in order of placement
    {
      $this->$possibleWins = array(array(0,1,2), array(3,4,5), array(6,7,8), array(0,3,6), array(1,4,7), array(2,5,8), array(0,4,8), array(2,4,6));
      $this->lastMove = end($sequencedMoves);
      $this->size = count($sequencedMoves);

      $this->buildBoard($sequencedMoves);
    }

    private function buildBoard($moves)
    {
      for($i = 0; $i < count($moves); $i++)
      {
        if($i%2 == 0) //if move is X
        {
          $this->tiles[$moves[$i]] = "X";
        }
        else
        {
          $this->tiles[$moves[$i]] = "O";
        }
      }
    }

    public function getGrayStatus()
    {
      $targetBoard = $this->lastMove%9;

      if($this->checkBoardFull($targetBoard))
      {
        return -1;
      }
      return $targetBoard;
    }

    public function getNumMoves()
    {
      return $this->size;
    }

    public function checkBoardFull($board)
    {
      for($i = 0; $i < 9; $i++)
      {
        if(!array_key_exists($board+$i, $this->tiles))
        {
          return false;
        }
      }
      return true;
    }

    public function getTileValue($position)
    {
      if(array_key_exists($position, $this->tiles))
      {
        return $this->tiles[$position];
      }
      else return "";
    }

  }

?>
