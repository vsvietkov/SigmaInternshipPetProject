import React from "react";
import {Input} from "../../input";

export function ParallelogramInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          id="sideSmall"
          label="AB,CD:"
          name="Parallelogram_sideSmall"
        />
        <Input
          id="sideBig"
          label="BC,AD:"
          name="Parallelogram_sideBig"
        />
      </div>
      <div className="row my-2">
        <Input
          id="diagonalBig"
          label="AC:"
          name="Parallelogram_diagonalBig"
        />
        <Input
          id="diagonalSmall"
          label="BD:"
          name="Parallelogram_diagonalSmall"
        />
      </div>
      <div className="row my-2">
        <Input
          id="altitude"
          label="Altitude(BH):"
          name="Parallelogram_altitude"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
