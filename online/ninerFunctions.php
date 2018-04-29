<?php
  function buildBoardArray($gameStateInteger) {
    //$boardState is between 0 and 333,333,333
    //Each digit represent the state of each of the 9 sub-tables
    //0 means not won, 1 means X won, 2 means O won, 3 means neutral board

    //convert input to string and ensure it is of length 9
    $stringOfStates = (string)$gameStateInteger;
    while(9 - strlen($stringOfStates) != 0)
    {
      $stringOfStates = "0".$stringOfStates;
    }

    //Create and build return variable
    $returnArray = array();
    for($j = 0; $j < 9; $j++)
    {
      $currentState = substr($stringOfStates, $j, 1);

      if($currentState == 0)
      {
        $returnArray[$j] = "";
      }
      elseif($currentState == 1)
      {
        $returnArray[$j] = "Xwinner";
      }
      elseif($currentState == 2)
      {
        $returnArray[$j] = "Owinner";
      }
      elseif($currentState == 3)
      {
        $returnArray[$j] = "Awinner";
      }
    }

    return $returnArray;
  }


  function makeGrayArray($grayNum)
  {
    $grayArray = array();
    
    if($grayNum == -1)
    {
      for($i = 0; $i < 9; $i++)
      {
        array_push($grayArray, " ");
      }
    }
    else
    {
      for($i = 0; $i < 9; $i++)
      {
        if($i == $grayNum)
        {
          array_push($grayArray, " ");
        }
        else
        {
          array_push($grayArray, " grayed");
        }
      }
    }

    return $grayArray;
  }
?>
