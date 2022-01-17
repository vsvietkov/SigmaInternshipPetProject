import React from "react";
import {Input} from "../../input";

export function TrapezoidInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          id="sideSideways"
          label="Side a:"
          name="Trapezoid_sideSideways"
        />
        <Input
          id="sideBig"
          label="Side b:"
          name="Trapezoid_sideBig"
        />
      </div>
      <div className="row my-2">
        <Input
          id="sideSmall"
          label="Side c:"
          name="Trapezoid_sideSmall"
        />
        <Input
          id="diagonal"
          label="Diagonal:"
          name="Trapezoid_diagonal"
        />
      </div>
      <div className="row my-2">
        <Input
          id="altitude"
          label="Altitude(h):"
          name="Trapezoid_altitude"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
