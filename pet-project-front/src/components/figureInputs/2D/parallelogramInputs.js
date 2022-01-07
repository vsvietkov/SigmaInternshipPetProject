import React from "react";
import {Input} from "../../input";

export function ParallelogramInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          label="AB,CD:"
          name="sideSmall"
        />
        <Input
          label="BC,AD:"
          name="sideBig"
        />
      </div>
      <div className="row my-2">
        <Input
          label="AC:"
          name="diagonalBig"
        />
        <Input
          label="BD:"
          name="diagonalSmall"
        />
      </div>
      <div className="row my-2">
        <Input
          label="Altitude(BH):"
          name="altitude"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
