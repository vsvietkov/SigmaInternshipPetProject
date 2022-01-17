import React from "react";
import {Input} from "../../input";

export function SquareInputs(props) {
  return (
    <div className="row my-2">
      <Input
        id="side"
        label="Side:"
        name="side"
      />
      <Input
        id="diagonal"
        label="Diagonal:"
        name="Square_diagonal"
      />
    </div>
  )
}
