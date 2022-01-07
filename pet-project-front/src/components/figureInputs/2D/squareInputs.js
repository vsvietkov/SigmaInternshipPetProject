import React from "react";
import {Input} from "../../input";

export function SquareInputs(props) {
  return (
    <div className="row my-2">
      <Input
        label="Side:"
        name="side"
      />
      <Input
        label="Diagonal:"
        name="diagonal"
      />
    </div>
  )
}
