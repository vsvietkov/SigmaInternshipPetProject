import React from "react";
import {Input} from "../../input";

export function RectangleInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          label="Side a:"
          name="sideSmall"
        />
        <Input
          label="Side b:"
          name="sideBig"
        />
      </div>
      <div className="row my-2">
        <Input
          label="Diagonal:"
          name="diagonal"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
