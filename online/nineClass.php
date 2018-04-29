<?php
  class ninerBoard {

    private $user1 = "";
    private $user2 = "";
    private $gameID;
    private $tiles = array(); // $tiles is the 81 X/Os
    //private $board = array(); // $board is the 9 subtables

    private $last;

    private $possibleWins;// = array(array(0,1,2), array(3,4,5), array(6,7,8), array(0,3,6), array(1,4,7), array(2,5,8), array(0,4,8), array(2,4,6));

    public function __construct($user1, $user2, $sequencedMoves, $gameID) //$sequencedMoves is list of moves (value 0-80) in order of placement
    {
      $this->$possibleWins = array(array(0,1,2), array(3,4,5), array(6,7,8), array(0,3,6), array(1,4,7), array(2,5,8), array(0,4,8), array(2,4,6));
      // $this->user1 = $user1;
      // $this->user2 = $user2;
      // $this->gameID = $gameID;
      $this->last = end($sequencedMoves);

      //$this->buildBoardWins($sequencedMoves);
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

      // for($j = 0; $j < 81; $j++)
      // {
      //   if(!array_key_exists($j, $this->tiles))
      //   {
      //     $this->tiles[$j] = "";
      //   }
      // }
    }

    public function getGrayStatus()
    {
      $targetBoard = $this->last%9;

      if(checkBoardFull($targetBoard))
      {
        return -1;
      }
      return $targetBoard;
    }

    public function getNumMoves()
    {
      return count($this->tiles);
    }

    public function checkBoardFull($board)
    {
      for($i = 0; $i < 9; $i++)
      {
        if(!array_key_exists($this->tiles[$board+$i]))
        {
          return false;
        }
      }
      return true;
    }

    public function getTileValue($position)
    {
      if(array_key_exists($this->tiles[$position]))
      {
        return $this->tiles[$position];
      }
      else return "";
    }


    // //Create $board array of won boards
    // private function buildBoardWins($moveList)
    // {
    //   $numMoves = count($moveList);
    //
    //   for($x = 0; $x < $numMoves; $x++)
    //   {
    //     //array_push($this->tiles, $moveList[$x]);
    //     $this->updateBoard($moveList[$x], $x);
    //   }
    // }
    //
    // //Check for new sub-table win and store in $this->board
    // private function updateBoard($nextMove, $x)
    // {
    //   array_push($this->tiles, $nextMove);
    //
    //   $boardAffected = intval(floor($nextMove/9));
    //
    //   if(!array_key_exists($boardAffected, $this->board))
    //   {
    //     foreach ((array) $this->possibleWins as $winArray) //For each possible
    //     {
    //       //declare indices checked in $this->tiles
    //       $index1 = $winArray[0]+9*$boardAffected;
    //       $index2 = $winArray[1]+9*$boardAffected;
    //       $index3 = $winArray[2]+9*$boardAffected;
    //
    //       if($this->tiles[$index1] == $this->tiles[$index2] && $this->tiles[$index1] == $this->tiles[$index3] && array_key_exists($index1, $this->tiles))
    //       {
    //         $this->board[$boardAffected] = ($x%2 == 0) ? "X" : "O";
    //       }
    //     }
    //   }
    // }
  }

?>
