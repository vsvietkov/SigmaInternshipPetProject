import React from "react";
import {Input} from "../../input";

export function TrapezoidInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          label="Side a:"
          name="sideSideways"
        />
        <Input
          label="Side b:"
          name="sideBig"
        />
      </div>
      <div className="row my-2">
        <Input
          label="Side c:"
          name="sideSmall"
        />
        <Input
          label="Diagonal:"
          name="diagonal"
        />
      </div>
      <div className="row my-2">
        <Input
          label="Altitude(h):"
          name="altitude"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
